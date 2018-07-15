<?php

class product_type extends CI_Controller {
	
	var $menu = array();
	var $judul = 'Product type';

	public function __construct() {			
		parent::__construct();

		$idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
            redirect(site_url('admin'), '');
        }

		$this->load->model('modelgetmenu');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();
		
		$this->menu = $this->modelgetmenu->getArrayKomponen(TRUE);
    }

	public function index()
	{	
		#get data
		$return = array();
		$return['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('product/index',$return); 			
	}	

	public function form_add(){
		$return = array();
		$this->session->set_userdata(
			array(
				'update_id' => null,
				'path_file' => $this->generate_random_alphanumeric(),
				'image' => null,
				'bg_image' => null	
			)
		);
		
		$this->load->view('product/form_add',$return);
	}

	public function form_edit(){
		$return = array();
		$id = $this->input->post('id');
		$data = $this->db->get_where('in_product_type',
				array(
					'id' => $id
				)
			)->result_array()
		;

		$return = $data[0];
		$path_file = $data[0]['image'];
		$path_file = explode('/',$path_file);
		$path_file = $path_file[0];

		$this->session->set_userdata(
			array(
				'update_id' => $id,
				'path_file' => $path_file,
				'image' => null,
				'bg_image' => null	
			)
		);
		
		$this->load->view('product/form_add',$return);
	}

	public function add(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('ind_title', 'Judul indonesia', 'required');
		$this->form_validation->set_rules('ind_description', 'Deskripsi indonesia', 'required');
		$this->form_validation->set_rules('eng_title', 'Judul inggris', 'required');
		$this->form_validation->set_rules('eng_description', 'Deskripsi inggris', 'required');
		$this->form_validation->run();
		
		if(validation_errors()){
			$result['status'] = 0;
			$message = explode('|',validation_errors());
			$result['message'] = $message[0];
			echo json_encode($result);
		}else if($this->session->userdata('image') == '' && $this->session->userdata('update_id') == ''){
			#kalau add dan image kosong
			$result['status'] = 0;
			$result['message'] = 'Image required';		
			echo json_encode($result);	
		}else if($this->session->userdata('bg_image') == '' && $this->session->userdata('update_id') == ''){
			#kalau udpate dan image kosong
			$result['status'] = 0;
			$result['message'] = 'BG Image required';
			echo json_encode($result);			
		}else{
			if($this->session->userdata('update_id') != ''){
				$this->db->where('id' , $this->session->userdata('update_id'));
				$params_update = array(
					'name' => $this->input->post('name'),
					'ind_title' => $this->input->post('ind_title'),
					'eng_title' => $this->input->post('eng_title'),
					'ind_description' => $_POST['ind_description'],
					'eng_description' => $_POST['eng_description']		
				);

				#kalau ada image aja, baru diupdate
				if($this->session->userdata('image') != ''){
					$params_update['image'] = $this->session->userdata('image');
				}
				if($this->session->userdata('bg_image') != ''){
					$params_update['bg_image'] = $this->session->userdata('bg_image');
				}

				$db_exec = $this->db->update(
					'in_product_type',$params_update
				);

			}else{
				$db_exec = $this->db->insert(
					'in_product_type',
					array(
						'name' => $this->input->post('name'),
						'ind_title' => $this->input->post('ind_title'),
						'eng_title' => $this->input->post('eng_title'),
						'ind_description' => $_POST['ind_description'],
						'eng_description' => $_POST['eng_description'],
						'image' => $this->session->userdata('image'),
						'bg_image' => $this->session->userdata('bg_image')
					)
				);
			}

			if($db_exec == '1'){
				$result['status'] = 1;
				$result['message'] = 'Sukses';
			}else{
				$result['status'] = 0;
				$result['message'] = 'Gagal';
			}

			echo json_encode($result);	
		}
	}

	public function upload_image(){
		$path_file = $this->session->userdata('path_file');

		if(isset($_FILES) && $_FILES['file']['size'] > '0'){	
			$ekstensiDokumen = explode('.',$_FILES['file']['name']);	
			$nama_file['file'] = date('YmdHis').'.'.$ekstensiDokumen['1'];
			$config['file_name'] = $nama_file['file'];
			
			#SESUAIKAN PATH
			$config['upload_path'] = FCPATH.'resource/uploaded/product_type_img/'.$path_file;
			
			$this->session->set_userdata(
				array(
					'image' => $path_file.'/'.$config['file_name']	
				)
			);

			$path_upload = $config['upload_path'];
	
			if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777, true);
			}
			$this->load->library('upload');
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('file'))
			{
				echo '0';
			}
			else
			{
				echo '1';
			}
		}else{
			echo '0';
		}
	}

	public function upload_background_image(){
		$path_file = $this->session->userdata('path_file');
		if(isset($_FILES['file']) && $_FILES['file']['size'] > '0'){	
			$ekstensiDokumen = explode('.',$_FILES['file']['name']);	
			$nama_file['file'] = date('YmdHis').'.'.$ekstensiDokumen['1'];
			$config['file_name'] = $nama_file['file'];
			
			#SESUAIKAN PATH
			$config['upload_path'] = FCPATH.'resource/uploaded/product_type_bg_img/'.$path_file;
			
			$this->session->set_userdata(
				array(
					'bg_image' => $path_file.'/'.$config['file_name']		
				)
			);

			$path_upload = $config['upload_path'];
	
			if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777, true);
			}
			$this->load->library('upload');
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('file'))
			{
				echo '0';
			}
			else
			{
				echo '1';
			}
		}else{
			echo '0';
		}
	}

	public function delete(){
		$this->db->where('id',$this->input->post('id'));
		$db_exec = $this->db->delete('in_product_type');
		
		if($db_exec == '1'){
			$result['status'] = 1;
			$result['message'] = 'Sukses';
		}else{
			$result['status'] = 0;
			$result['message'] = 'Gagal';
		}
		echo json_encode($result);
	}

	public function generate_random_alphanumeric(){
		 $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		 $string = '';
		 $max = strlen($characters) - 1;
		 for ($i = 0; $i < 15; $i++) {
		      $string .= $characters[mt_rand(0, $max)];
		 }
		 return $string; 
	}
}