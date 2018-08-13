<?php

class ctrhomepage extends CI_Controller 
{
	var $menu = array();
	var $judul = 'Pengaturan Halaman Depan';

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
		$data = $this->db->get('in_homepage')->result_array();

		if (empty($data)) {
			$this->session->set_userdata(
				array(
					'update_id' => null,
					'path_file' => $this->generate_random_alphanumeric(),
					'home_image_1' => null,
					'home_video_1' => null,	
					'home_video_2' => null,	
					'home_image_2' => null	
				)
			);
		}
		else {
			$return = $data[0];
			$path_file = $data[0]['home_image_1'];
			$path_file = explode('/',$path_file);
			$path_file = $path_file[0];

			$this->session->set_userdata(
				array(
					'update_id' => $data[0]['id'],
					'path_file' => $path_file,
					'home_image_1' => null,
					'home_video_1' => null,	
					'home_video_2' => null,	
					'home_image_2' => null
				)
			);
		}
		$this->load->view('homepage/form_add',$return);
	}

	public function add(){
		parse_str($_POST['forms'], $output);
		if (isset($_FILES['video']) || isset($_FILES['videothhumb'])) {
			if (isset($_FILES['video'])) {
				$video = $this->upload_video_1($_FILES['video']);
				if ($video === false) {
					$result['status'] = 0;
					$result['message'] = 'Upload Video Gagal';
					echo json_encode($result);
				}
			}
			elseif ($output['prodimg']) {
				$video = TRUE;
			}
			else {
				$result['status'] = 0;
				$result['message'] = 'Video 1 Kosong';
				echo json_encode($result);
			}
			if (isset($_FILES['videothhumb'])) {
				$videothhumb = $this->upload_video_2($_FILES['videothhumb']);
				if ($videothhumb === false) {
					$result['status'] = 0;
					$result['message'] = 'Upload Video Gagal';
					echo json_encode($result);
				}
			}
			elseif ($output['prodimgthumb']) {
				$videothhumb = TRUE;
			}
			else {
				$result['status'] = 0;
				$result['message'] = 'Video 2 Kosong';
				echo json_encode($result);
			}
		}		
		if ( $video == 1 && $videothhumb == 1) {
			if($this->session->userdata('update_id') != ''){
				$this->db->where('id' , $this->session->userdata('update_id'));
				$params_update = array(
					'link_1' => $output['link_1'],
					'link_2' => $output['link_2']
				);

				#kalau ada image aja, baru diupdate
				if($this->session->userdata('home_image_1') != ''){
					$params_update['home_image_1'] = $this->session->userdata('home_image_1');
				}
				if($this->session->userdata('home_image_2') != ''){
					$params_update['home_image_2'] = $this->session->userdata('home_image_2');
				}
				if($this->session->userdata('home_video_1') != ''){
					$params_update['home_video_1'] = $this->session->userdata('home_video_1');
				}
				else {
					$params_update['home_video_1'] = $output['prodimg'];
				}
				if($this->session->userdata('home_video_2') != ''){
					$params_update['home_video_2'] = $this->session->userdata('home_video_2');
				}
				else {
					$params_update['home_video_2'] = $output['prodimgthumb'];
				}

				$db_exec = $this->db->update(
					'in_homepage',$params_update
				);

			}else{
				parse_str($_POST['forms'], $output);
				$db_exec = $this->db->insert(
					'in_homepage',
					array(
						'home_image_1' => $this->session->userdata('home_image_1'),
						'home_image_2' => $this->session->userdata('home_image_2'),
						'home_video_1' => $this->session->userdata('home_video_1'),
						'home_video_2' => $this->session->userdata('home_video_2'),
						'link_1' => $output['link_1'],
						'link_2' => $output['link_2']
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

	public function upload_image_1(){
		$path_file = $this->session->userdata('path_file');

		if(isset($_FILES) && $_FILES['image_1']['size'] > '0'){	
			$ekstensiDokumen = explode('.',$_FILES['image_1']['name']);	
			$nama_file['image_1'] = date('YmdHis').'.'.$ekstensiDokumen['1'];
			$config['file_name'] = $nama_file['image_1'];
			
			#SESUAIKAN PATH
			$config['upload_path'] = FCPATH.'resource/uploaded/img/homepage/'.$path_file;
			
			$this->session->set_userdata(
				array(
					'home_image_1' => $path_file.'/'.$config['file_name']	
				)
			);

			$path_upload = $config['upload_path'];
	
			if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777, true);
			}
			$this->load->library('upload');
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('image_1'))
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

	public function upload_image_2(){
		$path_file = $this->session->userdata('path_file');

		if(isset($_FILES) && $_FILES['image_2']['size'] > '0'){	
			$ekstensiDokumen = explode('.',$_FILES['image_2']['name']);	
			$nama_file['image_2'] = date('YmdHis').'.'.$ekstensiDokumen['1'];
			$config['file_name'] = $nama_file['image_2'];
			
			#SESUAIKAN PATH
			$config['upload_path'] = FCPATH.'resource/uploaded/img/homepage/'.$path_file;
			
			$this->session->set_userdata(
				array(
					'home_image_2' => $path_file.'/'.$config['file_name']	
				)
			);

			$path_upload = $config['upload_path'];
	
			if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777, true);
			}
			$this->load->library('upload');
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('image_2'))
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

	public function upload_video_1(){
		$path_file = $this->session->userdata('path_file');
		
		if(isset($_FILES) && $_FILES['video']['size'] > '0'){	
			$ekstensiDokumen = explode('.',$_FILES['video']['name']);	
			$nama_file['video'] = date('YmdHis').'.'.$ekstensiDokumen['1'];
			$config['file_name'] = $nama_file['video'];
			
			#SESUAIKAN PATH
			$config['upload_path'] = FCPATH.'resource/uploaded/img/homepage/'.$path_file;
			$configVideo['max_size'] = '15728640';
			$config['allowed_types'] = 'mp4';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			
			$this->session->set_userdata(
				array(
					'home_video_1' => $path_file.'/'.$config['file_name']	
				)
			);

			$path_upload = $config['upload_path'];
	
			if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777, true);
			}
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('video'))
			{
				echo $this->upload->display_errors();
			}
			else
			{
				return 1;
			}
		}else{
			echo '0';
		}
	}

	public function upload_video_2(){
		$path_file = $this->session->userdata('path_file');

		if(isset($_FILES) && $_FILES['videothhumb']['size'] > '0'){	
			$ekstensiDokumen = explode('.',$_FILES['videothhumb']['name']);	
			$nama_file['videothhumb'] = date('YmdHis').'.'.$ekstensiDokumen['1'];
			$config['file_name'] = $nama_file['videothhumb'];
			
			#SESUAIKAN PATH
			$config['upload_path'] = FCPATH.'resource/uploaded/img/homepage/'.$path_file;
			$configVideo['max_size'] = '15728640';
			$config['allowed_types'] = 'mp4';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			
			$this->session->set_userdata(
				array(
					'home_video_2' => $path_file.'/'.$config['file_name']	
				)
			);

			$path_upload = $config['upload_path'];
	
			if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777, true);
			}
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('videothhumb'))
			{
				echo $this->upload->display_errors();
			}
			else
			{
				return 1;
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