<?php

class ctrpostcontent extends CI_Controller {
	
	var $menu = array();
	var $judul = 'Post Content';

	public function __construct() {			
		parent::__construct();

		$idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
            redirect(site_url('admin'), '');
        }

		$this->load->model(array('modelgetmenu', 'modelcontent'));
		$this->load->helper('form');
		//$this->load->library('form_validation');
		$this->load->database();
		
		$this->menu = $this->modelgetmenu->getArrayKomponen(TRUE);
    }

	public function index()
	{	
		$return = array();
		$hasil = $this->db->get('in_post_content')->result_array();
		foreach ($hasil as $key => $value) {
			$kategori = json_decode($value['categories'], true);
			$data = array();
			if ($kategori)
			{
				foreach ($kategori as $index => $val) {
					$this->db->where('id', $val);
					$q = $this->db->get('in_post_categories')->row();
					if ($q)
					{
						$hasil = $q->name;
						$data[] = $hasil;
					}
					
				}			
			}
				
			$value['categories'] = $data;
			$return[] = $value;
		}
		$return['data'] = $return;
		$this->load->view('postcontent/index',$return); 			
	}

	public function kategoriOptions(){
		$result = array();
		$in_product_type = $this->db->get('in_post_categories')->result_array();
		if(count($in_product_type) > 0){
			foreach ($in_product_type as $key => $value) {
				$result[$value['id']] = $value['name'];
			}	
		}
		
		return $result;
	}

	public function form_add(){
		$return = array();

		$this->session->set_userdata(
			array(
				'update_id' => null	
			)
		);
		$return['kategoriOptions'] = $this->kategoriOptions();
		$this->load->view('postcontent/form_add',$return);
	}

	public function insertKategori(){
		$insert = array(
            'name' => $_POST['nama'],
            'description' => ''
        );  

        $this->db->insert('in_post_categories', $insert);           
        if ($this->db->affected_rows() > 0) {
            $result['status'] = 1;
			$result['message'] = 'Input Berhasil';
			echo json_encode($result);
        } else {
            $result['status'] = 0;
			$result['message'] = 'Input Gagal';
			echo json_encode($result);
        }
	}

	public function form_edit(){
		$return = array();
		$id = $this->input->post('id');
		$data = $this->db->get_where('in_post_content',
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
		$return['kategoriOptions'] = $this->kategoriOptions();
		$this->load->view('postcontent/form_edit',$return);
	}

	public function add(){
		$post = $this->modelcontent->insertInPost($_POST);
		if (empty($post)) {
			$result['status'] = 0;
			$result['message'] = 'Input Gagal';
			echo json_encode($result);
		}
		if (isset($_FILES['image'])) {
			$images = $this->upload_image($_FILES['image']);
			if ($images === false) {
				$result['status'] = 0;
				$result['message'] = 'Upload image post Gagal';
				echo json_encode($result);
			}
		}
		else {
			$result['status'] = 0;
			$result['message'] = 'Image Kosong';
			echo json_encode($result);
		}
		if (isset($_FILES['imagethumb'])) {
			$imagethumb = $this->upload_image_thumb($_FILES['imagethumb']);
			if ($imagethumb === false) {
				$result['status'] = 0;
				$result['message'] = 'Upload image Thumb Gagal';
				echo json_encode($result);
			}
		}
		else {
			$result['status'] = 0;
			$result['message'] = 'Image Thumbnail Kosong';
			echo json_encode($result);
		}
		$result['status'] = 1;
		$result['message'] = 'Input Berhasil';
		echo json_encode($result);
	}

	public function upload_image($image){
		// File upload configuration
        $config['upload_path'] = FCPATH.'resource/uploaded/img/postcontent/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        // Load and initialize upload library
        $this->load->library('upload');
        $this->upload->initialize($config);

        if($this->upload->do_upload('image')){
        	return 1;
        }
        else {
        	echo $this->upload->display_errors();
        }
	}

	public function upload_image_thumb($imagethumb){
		// File upload configuration
        $config['upload_path'] = FCPATH.'resource/uploaded/img/postcontent/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        // Load and initialize upload library
        $this->load->library('upload');
        $this->upload->initialize($config);

        if($this->upload->do_upload('imagethumb')){
        	return 1;
        }
        else {
        	echo $this->upload->display_errors();
        }
	}

	public function delete(){
		$this->db->where('id',$this->input->post('id'));
		$db_exec = $this->db->delete('in_post_content');
		
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