<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
	class ctrabout extends CI_Controller { 
	function __construct()
	{
		parent::__construct();
	}
		
	function index($xAwal=0,$xSearch=''){
		$idpegawai = $this->session->userdata('idpegawai');
		if (empty($idpegawai)) {
			redirect(site_url(), '');
		}
		if($xAwal <= -1){
			$xAwal = 0;
		}    
		$this->session->set_userdata('awal',$xAwal);
		$this->session->set_userdata('limit', 100); 
		$this->createformabout('0',$xAwal);
	} 
		
	function createformabout($xidx, $xAwal = 0, $xSearch = '') {
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('modelgetmenu');
		$xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
            link_tag('resource/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/tiny_mce/tiny_mce_src.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/tiny_mce/jquery.tinymce.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxmce2.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxtabs.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxabout.js"></script>';
		echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormabout($xidx), '', '', $xAddJs,'','About' ); 
	}
 
	function setDetailFormabout($xidx){
		$this->load->helper('form');
		$this->load->model('modelabout');
	    $row = $this->modelabout->getDetailabout();

	    $id = (isset($row->id) ? $row->id : "0");
	    $isiindo = (isset($row->isi_indo) ? $row->isi_indo : "");
	    $isieng = (isset($row->isi_eng) ? $row->isi_eng : "");	    
	    $xBufResult = '';
	    $xBufResult = '<div id="stylized" class="myform col-md-12">' . form_open_multipart('ctrabout/inserttable', array('id' => 'form', 'name' => 'form'));
	    $this->load->helper('common');
	    $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="'.$id.'" />';
	    $xBufResult .= '
		<ul class="tabs">
			<li class="tab-link current" data-tab="tab-1">Indonesia</li>
			<li class="tab-link" data-tab="tab-2">English</li>
		</ul>';
		$xBufResult .= '<div id="tab-1" class="tab-content current">';	
	    $xBufResult .= setForm('', '',  form_textarea(getArrayObj('eddescriptionindonesia', $isiindo, '500'), '', 'class="tinymce" placeholder="description" '));
	    $xBufResult .= '</div>';
		$xBufResult .= '<div id="tab-2" class="tab-content">';
		$xBufResult .= setForm('', '',  form_textarea(getArrayObj('eddescriptionenglish', $isieng, '500'), '', 'class="tinymce" placeholder="description" '));
		$xBufResult .= '</div>';
		$xBufResult .= '<div class="spacer"></div>';
	    $xBufResult .= '</div><div class="clearfix"></div>'. form_button('btSimpan', 'Save', 'onclick="dosimpanabout();"');
	    return $xBufResult;
	}

	function simpanabout() 
	{
	    $this->load->helper('json');
	    $this->load->helper('common');
	    $this->load->model('basemodel');
	    $this->load->model('modelabout');
	    if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
	    $xdescriptionindonesia = $_POST['eddescriptionindonesia'];
	    $xdescriptionenglish = $_POST['eddescriptionenglish'];
	   
	    $xiduser = $this->session->userdata('idpegawai');
	    if (!empty($xiduser)) {
	        if ($xidx != '0') {
	            $xStr = $this->modelabout->setUpdateabout($xidx, $xdescriptionindonesia, $xdescriptionenglish);
	        } else {
	            $xStr = $this->modelabout->setInsertabout($xdescriptionindonesia, $xdescriptionenglish);
	        }
	    }
	    echo json_encode(null);
	}
}