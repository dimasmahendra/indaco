<?php

class ctrdepo extends CI_Controller {
	
	var $menu = array();
	var $judul = 'Daftar Depo';

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
		$return = array();
		$return['data'] = $this->db->get('in_depo')->result_array();
		$this->load->view('depo/index',$return); 			
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
		
		$this->load->view('depo/form_add',$return);
	}

	public function form_edit(){
		$return = array();
		$id = $this->input->post('id');
		$data = $this->db->get_where('in_depo',
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
		
		$this->load->view('depo/form_add',$return);
	}

	public function add(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('nama_depo', 'Nama Depo', 'required');

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
		}else{
			$depo_utama = $this->input->post('depo_utama');

			$this->db->update('in_depo',array('depo_utama' => 0));

			if($this->session->userdata('update_id') != ''){
				$this->db->where('id' , $this->session->userdata('update_id'));
				$params_update = array(
					'nama_depo' => $this->input->post('nama_depo'),
					'alamat_depo' => $this->input->post('alamat_depo'),
					'nama_bm' => $this->input->post('nama_bm'),
					'nama_admin' => $this->input->post('nama_admin'),
					'tel_bm' => $this->input->post('tel_bm'),
					'tel_admin' => $this->input->post('tel_admin'),
					'map_lat' => $this->input->post('map_lat'),
					'map_lang' => $this->input->post('map_lang'),
					'depo_utama' => ($depo_utama == 'true')
				);

				#kalau ada image aja, baru diupdate
				if($this->session->userdata('image') != ''){
					$params_update['image'] = $this->session->userdata('image');
				}

				$db_exec = $this->db->update(
					'in_depo',$params_update
				);

			}else{
				$db_exec = $this->db->insert(
					'in_depo',
					array(
						'nama_depo' => $this->input->post('nama_depo'),
						'alamat_depo' => $this->input->post('alamat_depo'),
						'nama_bm' => $this->input->post('nama_bm'),
						'nama_admin' => $this->input->post('nama_admin'),
						'tel_bm' => $this->input->post('tel_bm'),
						'tel_admin' => $this->input->post('tel_admin'),
						'image' => $this->session->userdata('image'),
						'map_lat' => $this->input->post('map_lat'),
						'map_lang' => $this->input->post('map_lang'),
						'depo_utama' => ($depo_utama == 'true')
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
			$config['upload_path'] = FCPATH.'resource/uploaded/img/depo/'.$path_file;
			
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

	public function delete(){
		$this->db->where('id',$this->input->post('id'));
		$db_exec = $this->db->delete('in_depo');
		
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