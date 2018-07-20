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

		$this->load->model(array('modelgetmenu', 'modelproduk'));
		$this->load->helper('form');
		//$this->load->library('form_validation');
		$this->load->database();
		
		$this->menu = $this->modelgetmenu->getArrayKomponen(TRUE);
    }

	public function index()
	{	
		#get data
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
		$data = $this->db->get_where('in_products',
				array(
					'id' => $id
				)
			)->result_array()
		;

		$return = $data[0];

		$this->session->set_userdata(
			array(
				'update_id' => $id
			)
		);

		$return['typeOptions'] = $this->typeOptions();
		$return['features'] = $this->features();
		$return['color_images'] = $this->color_images($id);
		$return['docs_product'] = $this->docs_product($id);

		$this->load->view('product_crud/form_edit',$return);
	}

	public function add(){
		$post = $this->modelproduk->insertInProduct($_POST);
		if (empty($post)) {
			$result['status'] = 0;
			$result['message'] = 'Input Gagal';
			echo json_encode($result);
		}
		if (isset($_FILES['product_images'])) {
			$product_images = $this->upload_image_product($_FILES['product_images']);
			if ($product_images === false) {
				$result['status'] = 0;
				$result['message'] = 'Upload image product Gagal';
				echo json_encode($result);
			}
		}
		if (isset($_POST['color_name'])) {
			$images = $this->upload_image($_FILES['color'], $post, $_POST['color_name'], $_POST['color_code']);
			if ($images === false) {
				$result['status'] = 0;
				$result['message'] = 'Upload image colour Gagal';
				echo json_encode($result);
			}
		}
		if (isset($_FILES['docs'])) {
			$docs = $this->upload_docs($_FILES['docs'], $post, $_POST['docs_name']);
			if ($docs === false) {
				$result['status'] = 0;
				$result['message'] = 'Upload Document Gagal';
				echo json_encode($result);
			}
		}	
	}

	public function upload_image($color, $product_id, $color_name, $color_code){
		foreach ($color['name'] as $key => $value) {
			$_FILES['file']['name']     = $color['name'][$key];
            $_FILES['file']['type']     = $color['type'][$key];
            $_FILES['file']['tmp_name'] = $color['tmp_name'][$key];
            $_FILES['file']['error']    = $color['error'][$key];
            $_FILES['file']['size']     = $color['size'][$key];

            // File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/img/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('file')){
            	$insert = array(
		            'product_id' => $product_id,
		            'name' => $color_name[$key],
		            'code' => $color_code[$key],
		            'image' => $_FILES['file']['name']
		        );  
		        $this->db->insert('in_product_color', $insert);           
		        if ($this->db->affected_rows() > 0) {
		            echo '1';
		        } else {
		            return false;
		        }
            }
            else {
            	return false;
            }
		}
	}

	public function upload_docs($docs, $product_id, $docs_name){
		foreach ($docs['name'] as $key => $value) {
			$_FILES['file']['name']     = $docs['name'][$key];
            $_FILES['file']['type']     = $docs['type'][$key];
            $_FILES['file']['tmp_name'] = $docs['tmp_name'][$key];
            $_FILES['file']['error']    = $docs['error'][$key];
            $_FILES['file']['size']     = $docs['size'][$key];

            // File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/docs/';
            $config['allowed_types'] = 'pdf|doc|xls|docx';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('file')){
                $insert = array(
		            'product_id' => $product_id,
		            'name' => $docs_name[$key],
		            'filename' => $_FILES['file']['name']
		        );  
		        $this->db->insert('in_product_file', $insert);           
		        if ($this->db->affected_rows() > 0) {
		            echo '1';
		        } else {
		            return false;
		        }
            }
            else {
            	return false;
            }
		}
	}

	public function upload_image_product($product_images){
		foreach ($product_images['name'] as $key => $value) {
			$_FILES['file']['name']     = $product_images['name'][$key];
            $_FILES['file']['type']     = $product_images['type'][$key];
            $_FILES['file']['tmp_name'] = $product_images['tmp_name'][$key];
            $_FILES['file']['error']    = $product_images['error'][$key];
            $_FILES['file']['size']     = $product_images['size'][$key];

            // File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/img/product_images/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('file')){
                echo '1';
            }
            else {
            	return false;
            }
		}
	}

	public function editcolor(){
		if ($_FILES['image_upload']['size'] == 0 && $_FILES['image_upload']['name'] == '') {
			$post = array(
				'product_id' => $_POST['id_product'],
				'name' => $_POST['name_color'],
				'code' => $_POST['code_color'],
				'image' => $_POST['image_color']
			);
			$this->db->where('id', $_POST['id_color']);
	        $update = $this->db->update('in_product_color', $post);
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
			// File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/img/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('image_upload')){
            	$data = $this->upload->data();
                $post = array(
                	'product_id' => $_POST['id_product'],
                	'name' => $_POST['name_color'],
                	'code' => $_POST['code_color'],
                	'image' => $data['file_name']
                );
                $this->db->where('id', $_POST['id_color']);
                $update = $this->db->update('in_product_color', $post);
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

	public function editfiles(){
		if ($_FILES['file_upload']['size'] == 0 && $_FILES['file_upload']['name'] == '') {
			$post = array(
				'product_id' => $_POST['id_products'],
				'name' => $_POST['name_file'],
				'filename' => $_POST['file_name']
			);
			$this->db->where('id', $_POST['id_file']);
	        $update = $this->db->update('in_product_file', $post);
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
			// File upload configuration
            $config['upload_path'] = FCPATH.'resource/uploaded/docs/';
            $config['allowed_types'] = 'pdf|doc|xls|docx|xlsx';

            // Load and initialize upload library
            $this->load->library('upload');
            $this->upload->initialize($config);

            if($this->upload->do_upload('file_upload')){
            	$data = $this->upload->data();
                $post = array(
                	'product_id' => $_POST['id_products'],
                	'name' => $_POST['name_file'],
                	'filename' => $data['file_name']
                );
                $this->db->where('id', $_POST['id_file']);
                $update = $this->db->update('in_product_file', $post);
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

	public function delete_color($id){
		$this->db->where('id', $id);
		$db_exec = $this->db->delete('in_product_color');
		
		if($db_exec == '1'){
            redirect('product_crud/index', 'refresh');
		}else{
            redirect('product_crud/index', 'refresh');
		}
	}

	public function delete_file($id){
		$this->db->where('id', $id);
		$db_exec = $this->db->delete('in_product_file');
		
		if($db_exec == '1'){
            redirect('product_crud/index', 'refresh');
		}else{
            redirect('product_crud/index', 'refresh');
		}
	}

	public function delete(){
		$this->db->where('id',$this->input->post('id'));
		$db_exec = $this->db->delete('in_products');
		
		if($db_exec == '1'){
			$this->db->where('product_id',$this->input->post('id'));
			$db_exec = $this->db->delete('in_product_color');
			if($db_exec == '1'){
				$this->db->where('product_id',$this->input->post('id'));
				$db_exec = $this->db->delete('in_product_file');
				if($db_exec == '1'){
					$result['status'] = 1;
					$result['message'] = 'Sukses';
				}
			}
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