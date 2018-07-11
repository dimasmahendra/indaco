<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 

class ctrpublic extends CI_Controller
{
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('indaco/main', array(
			'title' => 'INDACO',
			'css' => site_url('resource/indaco/css/home.css'),
			'js' => array(
				site_url('resource/indaco/js/indaco.js'),
				site_url('resource/indaco/js/plugins.js'),
				site_url('resource/indaco/js/home.js')
			),
			'body'  => $this->load->view('indaco/home', array(), true)
		));
	}

	public function product($type = null)
	{
		$this->load->view('indaco/main', array(
			'title' => 'PRODUCT - INDACO',
			'css' => site_url('resource/indaco/css/product.css'),
			'js' => array(
				site_url('resource/indaco/js/indaco.js'),
				site_url('resource/indaco/js/plugins.js'),
				site_url('resource/indaco/js/product.js')
			),
			'body'  => $this->load->view('indaco/product', array(), true)
		));
	}

	public function inspirasi()
	{
		$this->load->view('indaco/main', array(
			'title' => 'INSPIRASI - INDACO',
			'css' => array(
				site_url('resource/indaco/css/jquery.mCustomScrollbar.css'),
				site_url('resource/indaco/css/inspirasi.css')
			),
			'js' => array(				
				site_url('resource/indaco/js/jquery.mCustomScrollbar.concat.min.js'),
				site_url('resource/indaco/js/indaco.js'),
				site_url('resource/indaco/js/3d-carousel.js'),
				site_url('resource/indaco/js/inspirasi.js')
			),
			'body'  => $this->load->view('indaco/inspirasi', array(), true)
		));
	}

	public function cara_kami()
	{
		$this->load->view('indaco/main', array(
			'title' => 'CARA KAMI - INDACO',
			'js' => array(				
				site_url('resource/indaco/js/jquery.mCustomScrollbar.concat.min.js'),
				site_url('resource/indaco/js/indaco.js')
			),
			'body'  => $this->load->view('indaco/cara_kami', array(), true)
		));
	}

	public function tentang_kami()
	{
		$this->load->view('indaco/main', array(
			'title' => 'TENTANG KAMI - INDACO',
			'js' => array(				
				site_url('resource/indaco/js/jquery.mCustomScrollbar.concat.min.js'),
				site_url('resource/indaco/js/indaco.js')
			),
			'body'  => $this->load->view('indaco/tentang_kami', array(), true)
		));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */