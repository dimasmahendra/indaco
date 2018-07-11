<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : kota   *  By Diar */;

class ctrkota extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($xAwal = 0, $xSearch = '') {
        //  $this->load->view('kota.php');
        $idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
            redirect(site_url(), '');
        }
        if ($xAwal <= -1) {
            $xAwal = 0;
        } $this->session->set_userdata('awal', $xAwal);
        $this->createformkota('0', $xAwal);
    }

    function createformkota($xidx, $xAwal = 0, $xSearch = '') {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('modelgetmenu');
        $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
                link_tag('resource/css/admin/upload/css/upload.css') . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxkota.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormkota($xidx), '', '', $xAddJs, '');
    }

    function setDetailFormkota($xidx) {
        $this->load->helper('form');
        $this->load->model('modelprovinsi');
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform"><h3>kota</h3><div class="garis"></div>' . form_open_multipart('ctrkota/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />';
        $xBufResult .= setForm('edidprovinsi', 'idprovinsi', form_dropdown('edidprovinsi', $this->modelprovinsi->getArraylistprovinsi(), '', 'id="edidprovinsi" onchange="provinsiselect()"')) . '<div class="spacer"></div>';
        
        $xBufResult .= setForm('edkode_kota', 'kode_kota', form_input(getArrayObj('edkode_kota', '', '200'))) . '<div class="spacer"></div>';

        $xBufResult .= setForm('edkota', 'kota', form_input(getArrayObj('edkota', '', '200'))) . '<div class="spacer"></div>';

//        $xBufResult .= setForm('edidprovinsi', 'idprovinsi', form_input(getArrayObj('edidprovinsi', '', '200'))) . '<div class="spacer"></div>';

        $xBufResult .= '<div class="garis"></div>' . form_button('btSimpan', 'Simpan', 'onclick="dosimpankota();"') . form_button('btNew', 'Baru', 'onclick="doClearkota();"') . '<div class="spacer"></div><div id="tabledatakota">' . $this->getlistkota(0, '') . '</div><div class="spacer"></div>';
        return $xBufResult;
    }

    function getlistkota($xAwal, $xSearch) {
        $xLimit = 10;
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('idx', '', 'width=10%') .
                tbaddcellhead('kode_kota', '', 'width=10%') .
                tbaddcellhead('kota', '', 'width=10%') .
                tbaddcellhead('idprovinsi', '', 'width=10%') .
                tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelkota');
        $xQuery = $this->modelkota->getListkota($xAwal, $xLimit, $xSearch);
        $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
        foreach ($xQuery->result() as $row) {
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditkota(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapuskota(\'' . $row->idx . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->kode_kota) .
                    tbaddcell($row->kota) .
                    tbaddcell($row->idprovinsi) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ''));
        $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchkota(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
        
//        $xButtonSearch = '<img src="' . base_url() . 'resource/imgbtn/b_view.png" alt="Search Data" onclick = "dosearchkota(0);" style="border:none;width:30px;height:30px;" />';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchkota(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchkota(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . '&nbsp&nbsp' . $xButtonNext.'</div></div>';
        $xbufResult = tablegrid($xbufResult.'</tbody>').$xbuffoottable;
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>';
    }

    function getlistkotaAndroid() {
        $this->load->helper('json');
        $xSearch = $_POST['search'];
        $xAwal = $_POST['start'];
        $xLimit = $_POST['limit'];
        $this->load->helper('form');
        $this->load->helper('common');
        $this->json_data['idx'] = "";
        $this->json_data['kode_kota'] = "";
        $this->json_data['kota'] = "";
        $this->json_data['idprovinsi'] = "";

        $response = array();
        $this->load->model('modelkota');
        $xQuery = $this->modelkota->getListkota($xAwal, $xLimit, $xSearch);
        foreach ($xQuery->result() as $row) {
            $this->json_data['idx'] = $row->idx;
            $this->json_data['kode_kota'] = $row->kode_kota;
            $this->json_data['kota'] = $row->kota;
            $this->json_data['idprovinsi'] = $row->idprovinsi;

            array_push($response, $this->json_data);
        }
        if (empty($response)) {
            array_push($response, $this->json_data);
        }
        echo json_encode($response);
    }

    function simpankotaAndroid() {
        $xidx = $_POST['edidx'];
        $xkode_kota = $_POST['edkode_kota'];
        $xkota = $_POST['edkota'];
        $xidprovinsi = $_POST['edidprovinsi'];

        $this->load->helper('json');
        $this->load->model('modelkota');
        $response = array();
        if ($xidx != '0') {
            $this->modelkota->setUpdatekota($xidx, $kode_kota, $kota, $idprovinsi);
        } else {
            $this->modelkota->setInsertkota($xidx, $kode_kota, $kota, $idprovinsi);
        }
        $row = $this->modelkota->getLastIndexkota();
        $this->json_data['idx'] = $row->idx;
        $this->json_data['kode_kota'] = $row->kode_kota;
        $this->json_data['kota'] = $row->kota;
        $this->json_data['idprovinsi'] = $row->idprovinsi;

        $response = array();
        array_push($response, $this->json_data);

        echo json_encode($response);
    }

    function editreckota() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelkota');
        $row = $this->modelkota->getDetailkota($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['kode_kota'] = $row->kode_kota;
        $this->json_data['kota'] = $row->kota;
        $this->json_data['idprovinsi'] = $row->idprovinsi;

        echo json_encode($this->json_data);
    }

    function deletetablekota() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelkota');
        $this->modelkota->setDeletekota($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchkota() {
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
        $this->json_data['tabledatakota'] = $this->getlistkota($xAwal, $xSearch);
        echo json_encode($this->json_data);
    }

    function simpankota() {
        $this->load->helper('json');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xkode_kota = $_POST['edkode_kota'];
        $xkota = $_POST['edkota'];
        $xidprovinsi = $_POST['edidprovinsi'];

        $this->load->model('modelkota');
        $idpegawai = $this->session->userdata('idpegawai');
        if (!empty($idpegawai)) {
            if ($xidx != '0') {
                $xStr = $this->modelkota->setUpdatekota($xidx, $xkode_kota, $xkota, $xidprovinsi);
            } else {
                $xStr = $this->modelkota->setInsertkota($xidx, $xkode_kota, $xkota, $xidprovinsi);
            }
        }
        echo json_encode(null);
    }

}
