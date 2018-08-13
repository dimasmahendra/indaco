<?php

class ctrinspirasi extends CI_Controller {
	
	var $menu = array();
	var $judul = 'Inspirasi';

	public function __construct() {			
		parent::__construct();

		$idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
            redirect(site_url('admin'), '');
        }

		$this->load->model(array('modelgetmenu', 'modelinspirasi'));
		$this->load->helper('form');
		//$this->load->library('form_validation');
		$this->load->database();
		
		$this->menu = $this->modelgetmenu->getArrayKomponen(TRUE);
    }

	public function index()
	{	
		$return = array();
		$return['data'] = $this->db->get('in_inspirasi')->result_array();
		$this->load->view('inspirasi/index',$return); 			
	}

	public function form_add(){
		$return = array();

		$this->session->set_userdata(
			array(
				'update_id' => null	
			)
		);
		
		$this->load->view('inspirasi/form_add',$return);
	}

	public function form_edit(){
		$return = array();
		$id = $this->input->post('id');
		$data = $this->db->get_where('in_inspirasi',
				array(
					'id' => $id
				)
			)->result_array()
		;
		$return = $data[0];
		$detail = $this->db->get_where('in_inspirasi_detail',
				array(
					'inspirasi_id' => $id
				)
			)->result_array()
		;
		$return['inspirasi_detail'] = $detail;

		$this->session->set_userdata(
			array(
				'update_id' => $id
			)
		);
		$this->load->view('inspirasi/form_edit',$return);
	}

	public function add(){
		$post = $this->modelinspirasi->insertInInspirasi($_POST);
		if (empty($post)) {
			$result['status'] = 0;
			$result['message'] = 'Input Gagal';
			echo json_encode($result);
		}
		if (isset($_FILES['image_inspirasi']) && isset($_FILES['background_inspirasi'])) {
			$images = $this->upload_image($post, $_FILES['image_inspirasi'], $_FILES['background_inspirasi'], $_POST['inspiration_name']);
			if ($images === false) {
				$result['status'] = 0;
				$result['message'] = 'Upload image colour Gagal';
				echo json_encode($result);
			}
		}
		print_r($images);die();
		$result['status'] = 1;
		$result['message'] = 'Input Berhasil';
		echo json_encode($result);
	}

	public function upload_image($inspirasi_id, $image_inspirasi, $background_inspirasi, $inspiration_name){
		foreach ($image_inspirasi['name'] as $key => $value) {
			$_FILES['file']['name']     = $image_inspirasi['name'][$key];
            $_FILES['file']['type']     = $image_inspirasi['type'][$key];
            $_FILES['file']['tmp_name'] = $image_inspirasi['tmp_name'][$key];
            $_FILES['file']['error']    = $image_inspirasi['error'][$key];
            $_FILES['file']['size']     = $image_inspirasi['size'][$key];

            $_FILES['background']['name']     = $background_inspirasi['name'][$key];
            $_FILES['background']['type']     = $background_inspirasi['type'][$key];
            $_FILES['background']['tmp_name'] = $background_inspirasi['tmp_name'][$key];
            $_FILES['background']['error']    = $background_inspirasi['error'][$key];
            $_FILES['background']['size']     = $background_inspirasi['size'][$key];

            // File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/img/inspirasi/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('file') && $this->upload->do_upload('background')){
            	$insert = array(
		            'inspirasi_id' => $inspirasi_id,
		            'name' => $inspiration_name[$key],
		            'image1' => $_FILES['file']['name'],
		            'image2' => $_FILES['background']['name']
		        );  
		        $this->db->insert('in_inspirasi_detail', $insert);           
		        if ($this->db->affected_rows() > 0) {
		            echo 1;
		        } else {
		            echo 'salah';
		        }
            }
            else {
            	return false;
            }
		}
	}

	public function editinspirasi(){
		if ($_FILES['image_inspirasi']['size'] == 0 && $_FILES['image_inspirasi']['name'] == '' && $_FILES['background_inspirasi']['size'] == 0 && $_FILES['background_inspirasi']['name'] == '') {
			$post = array(
				'inspirasi_id' => $_POST['id_inspirasi'],
				'name' => $_POST['name_inspirasi'],
				'image1' => $_POST['image_inspirasi_value'],
				'image2' => $_POST['image_background_value']
			);
			$this->db->where('id', $_POST['id_detail_inspirasi']);
	        $update = $this->db->update('in_inspirasi_detail', $post);
	        if ($update == '1')
	        {
	            echo "1";
	        } 
	        else 
	        {
	            return FALSE;
	        }
		}
		elseif ($_FILES['background_inspirasi']['size'] == 0 && $_FILES['background_inspirasi']['name'] == '') {
			// File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/img/inspirasi/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('image_inspirasi')){
            	$data = $this->upload->data();
                $post = array(
                	'inspirasi_id' => $_POST['id_inspirasi'],
					'name' => $_POST['name_inspirasi'],
					'image1' => $data['file_name'],
					'image2' => $_POST['image_background_value']
                );
                $this->db->where('id', $_POST['id_detail_inspirasi']);
                $update = $this->db->update('in_inspirasi_detail', $post);
                if ($update == '1')
                {
                	echo "1";
                } 
                else 
                {
                	return FALSE;
                }
            }
            else {
            	echo $this->upload->display_errors();
            }
		}
		elseif ($_FILES['image_inspirasi']['size'] == 0 && $_FILES['image_inspirasi']['name'] == '') {
			// File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/img/inspirasi/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('background_inspirasi')){
            	$data = $this->upload->data();
                $post = array(
                	'inspirasi_id' => $_POST['id_inspirasi'],
					'name' => $_POST['name_inspirasi'],
					'image1' => $_POST['image_inspirasi_value'],
					'image2' => $data['file_name']
                );
                $this->db->where('id', $_POST['id_detail_inspirasi']);
                $update = $this->db->update('in_inspirasi_detail', $post);
                if ($update == '1')
                {
                	echo "1";
                } 
                else 
                {
                	return FALSE;
                }
            }
            else {
            	echo $this->upload->display_errors();
            }
		}
		else {
			// File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/img/inspirasi/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('background_inspirasi') && $this->upload->do_upload('image_inspirasi')){
                $post = array(
                	'inspirasi_id' => $_POST['id_inspirasi'],
					'name' => $_POST['name_inspirasi'],
					'image1' => $_FILES['image_inspirasi']['name'],
					'image2' => $_FILES['background_inspirasi']['name']
                );
                $this->db->where('id', $_POST['id_detail_inspirasi']);
                $update = $this->db->update('in_inspirasi_detail', $post);
                if ($update == '1')
                {
                	echo "1";
                } 
                else 
                {
                	return FALSE;
                }
            }
            else {
            	echo $this->upload->display_errors();
            }
		}
	}

	public function delete_image($id){
		$this->db->where('id', $id);
		$db_exec = $this->db->delete('in_inspirasi_detail');
		
		if($db_exec == '1'){
            redirect('ctrinspirasi/index', 'refresh');
		}else{
            redirect('ctrinspirasi/index', 'refresh');
		}
	}

	public function delete(){
		$this->db->where('id',$this->input->post('id'));
		$db_exec = $this->db->delete('in_inspirasi');
		
		if($db_exec == '1'){
			$this->db->where('inspirasi_id',$this->input->post('id'));
			$db_exec = $this->db->delete('in_inspirasi_detail');
			if($db_exec == '1'){
				$result['status'] = 1;
				$result['message'] = 'Sukses';
			}
		}else{
			$result['status'] = 0;
			$result['message'] = 'Gagal';
		}
		echo json_encode($result);
	}
}