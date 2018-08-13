<?php

class ctrsubscriber extends CI_Controller {

	var $menu = array();
	var $judul = 'Subscriber';

	public function __construct() {			
		parent::__construct();

		$idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
            redirect(site_url('admin'), '');
        }

        $this->load->model('modelgetmenu');
		// $this->load->helper('form');
		// $this->load->library('form_validation');
		$this->load->database();
		
		$this->menu = $this->modelgetmenu->getArrayKomponen(TRUE);
    }

    public function index()
	{	
		$return = array();

		$subscriber = $this->db->order_by('created desc')->get('in_subscriber')->result_Array();
		$return['subscriber'] = $subscriber;

		$this->load->view('subscriber/index',$return); 			
	}

	public function delete()
	{
		$this->db->where('id',$this->input->post('id'));
		$db_exec = $this->db->delete('in_subscriber');
		
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