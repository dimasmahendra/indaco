<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : jenisakses   *  By Diar */;

class ctrjenisakses extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($xAwal = 0, $xSearch = '') {
        $idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
            redirect(site_url(), '');
        }
        if ($xAwal <= -1) {
            $xAwal = 0;
        } $this->session->set_userdata('awal', $xAwal);
        $this->createformjenisakses('0', $xAwal);
    }

    function createformjenisakses($xidx, $xAwal = 0, $xSearch = '') {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('modelgetmenu');
        $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
                link_tag('resource/css/admin/upload/css/upload.css') . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxjenisakses.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormjenisakses($xidx), '', '', $xAddJs, '');
    }

    function setDetailFormjenisakses($xidx) {
        $this->load->helper('form');
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform"><h3>jenisakses</h3><div class="garis"></div>' . form_open_multipart('ctrjenisakses/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />';

        $xBufResult .= setForm('edjenisakses', 'jenisakses', form_input(getArrayObj('edjenisakses', '', '200'))) . '<div class="spacer"></div>';

        $xBufResult .= '<div class="garis"></div>' . form_button('btSimpan', 'simpan', 'onclick="dosimpanjenisakses();"') . form_button('btNew', 'new', 'onclick="doClearjenisakses();"') . '<div class="spacer"></div><div id="tabledatajenisakses">' . $this->getlistjenisakses(0, '') . '</div><div class="spacer"></div>';
        return $xBufResult;
    }

    function getlistjenisakses($xAwal, $xSearch) {
        $xLimit = 10;
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('idx', '', 'width=10%') .
                tbaddcellhead('jenisakses', '', 'width=10%') .
                tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modeljenisakses');
        $xQuery = $this->modeljenisakses->getListjenisakses($xAwal, $xLimit, $xSearch);
        $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
        foreach ($xQuery->result() as $row) {
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditjenisakses(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusjenisakses(\'' . $row->idx . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->jenisakses) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ''));
        $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchjenisakses(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
//$xButtonSearch = '<img src="' . base_url() . 'resource/imgbtn/b_view.png" alt="Search Data" onclick = "dosearchjenisakses(0);" style="border:none;width:30px;height:30px;" />';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchjenisakses(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchjenisakses(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . '&nbsp&nbsp' . $xButtonNext.'</div></div>';
        $xbufResult = tablegrid($xbufResult.'</tbody>').$xbuffoottable;
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>';
    }

    function getlistjenisaksesAndroid() {
        $this->load->helper('json');
        $xSearch = $_POST['search'];
        $xAwal = $_POST['start'];
        $xLimit = $_POST['limit'];
        $this->load->helper('form');
        $this->load->helper('common');
        $this->json_data['idx'] = "";
        $this->json_data['jenisakses'] = "";

        $response = array();
        $this->load->model('modeljenisakses');
        $xQuery = $this->modeljenisakses->getListjenisakses($xAwal, $xLimit, $xSearch);
        foreach ($xQuery->result() as $row) {
            $this->json_data['idx'] = $row->idx;
            $this->json_data['jenisakses'] = $row->jenisakses;

            array_push($response, $this->json_data);
        }
        if (empty($response)) {
            array_push($response, $this->json_data);
        }
        echo json_encode($response);
    }

    function simpanjenisaksesAndroid() {
        $xidx = $_POST['edidx'];
        $xjenisakses = $_POST['edjenisakses'];

        $this->load->helper('json');
        $this->load->model('modeljenisakses');
        $response = array();
        if ($xidx != '0') {
            $this->modeljenisakses->setUpdatejenisakses($xidx, $xjenisakses);
        } else {
            $this->modeljenisakses->setInsertjenisakses($xidx, $xjenisakses);
        }
        $row = $this->modeljenisakses->getLastIndexjenisakses();
        $this->json_data['idx'] = $row->idx;
        $this->json_data['jenisakses'] = $row->jenisakses;

        $response = array();
        array_push($response, $this->json_data);

        echo json_encode($response);
    }

    function editrecjenisakses() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modeljenisakses');
        $row = $this->modeljenisakses->getDetailjenisakses($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['jenisakses'] = $row->jenisakses;

        echo json_encode($this->json_data);
    }

    function deletetablejenisakses() {
        $edidx = $_POST['edidx'];
        $this->load->model('modeljenisakses');
        $this->modeljenisakses->setDeletejenisakses($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchjenisakses() {
        $xAwal = $_POST['xAwal'];
        $xSearch = $_POST['xSearch'];
        $this->load->helper('json');
        if (($xAwal + 0) == -99) {
            $xAwal = $this->session->userdata('awal', $xAwal);
        }
        if ($xAwal + 0 <= -1) {
            $xAwal = 0;
            $this->session->set_userdata('awal', $xAwal);
        } else {
            $this->session->set_userdata('awal', $xAwal);
        }
        $this->json_data['tabledatajenisakses'] = $this->getlistjenisakses($xAwal, $xSearch);
        echo json_encode($this->json_data);
    }

    function simpanjenisakses() {
        $this->load->helper('json');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xjenisakses = $_POST['edjenisakses'];

        $this->load->model('modeljenisakses');
        $idpegawai = $this->session->userdata('idpegawai');
        if (!empty($idpegawai)) {
            if ($xidx != '0') {
                $xStr = $this->modeljenisakses->setUpdatejenisakses($xidx, $xjenisakses);
            } else {
                $xStr = $this->modeljenisakses->setInsertjenisakses($xidx, $xjenisakses);
            }
        }
        echo json_encode(null);
    }

}
