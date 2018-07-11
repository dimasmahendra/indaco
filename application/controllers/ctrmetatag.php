<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : metatag   *  By Diar */;

class ctrmetatag extends CI_Controller {

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
        }
        $this->session->set_userdata('awal', $xAwal);
        $this->session->set_userdata('limit', 100);
        $this->createformmetatag('0', $xAwal);
    }

    function createformmetatag($xidx, $xAwal = 0, $xSearch = '') {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('modelgetmenu');
        $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
                link_tag('resource/css/admin/upload/css/upload.css') . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxmetatag.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormmetatag($xidx), '', '', $xAddJs, '', 'metatag');
    }

    function setDetailFormmetatag($xidx) {
        $this->load->helper('form');
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform">' . form_open_multipart('ctrmetatag/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />';

        $xBufResult .= setForm('metakey', 'metakey', form_input(getArrayObj('edmetakey', '', '200'), '', ' placeholder="metakey" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('value', 'value', form_input(getArrayObj('edvalue', '', '200'), '', ' placeholder="value" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('idcontent', 'idcontent', form_input(getArrayObj('edidcontent', '', '200'), '', ' placeholder="idcontent" ')) . '<div class="spacer"></div>';

        $xBufResult .= '<div class="garis"></div>' . form_button('btSimpan', 'simpan', 'onclick="dosimpanmetatag();"') . form_button('btNew', 'new', 'onclick="doClearmetatag();"') . '<div class="spacer"></div><div id="tabledatametatag">' . $this->getlistmetatag(0, '') . '</div><div class="spacer"></div>';
        return $xBufResult;
    }

    function getlistmetatag($xAwal, $xSearch) {
        $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('idx', '', 'data-field="idx" data-sortable="true" width=10%') .
                tbaddcellhead('metakey', '', 'data-field="metakey" data-sortable="true" width=10%') .
                tbaddcellhead('value', '', 'data-field="value" data-sortable="true" width=10%') .
                tbaddcellhead('idcontent', '', 'data-field="idcontent" data-sortable="true" width=10%') .
                tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelmetatag');
        $xQuery = $this->modelmetatag->getListmetatag($xAwal, $xLimit, $xSearch);
        $xbufResult = '<thead>' . $xbufResult1 . '</thead>';
        $xbufResult .= '<tbody>';
        foreach ($xQuery->result() as $row) {
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditmetatag(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusmetatag(\'' . $row->idx . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->metakey) .
                    tbaddcell($row->value) .
                    tbaddcell($row->idcontent) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ' '));
        $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchmetatag(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchmetatag(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>' . $xAwal . ' to ' . $xLimit . '</button>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchmetatag(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">' . setForm('', '', $xInput . $xButtonSearch, '', '') . '</div>' .
                '<div class="col-md-6">' . $xButtonPrev . $xButtonhalaman . $xButtonNext . '</div></div>';

        $xbufResult = tablegrid($xbufResult . '</tbody>', '', 'id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';

        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>' . '<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
    }

    function getlistmetatagAndroid() {
        $this->load->helper('json');
        $xSearch = $_POST['search'];
        $xAwal = $_POST['start'];
        $xLimit = $_POST['limit'];
        $this->load->helper('form');
        $this->load->helper('common');
        $this->json_data['idx'] = "";
        $this->json_data['metakey'] = "";
        $this->json_data['value'] = "";
        $this->json_data['idcontent'] = "";

        $response = array();
        $this->load->model('modelmetatag');
        $xQuery = $this->modelmetatag->getListmetatag($xAwal, $xLimit, $xSearch);
        foreach ($xQuery->result() as $row) {
            $this->json_data['idx'] = $row->idx;
            $this->json_data['metakey'] = $row->metakey;
            $this->json_data['value'] = $row->value;
            $this->json_data['idcontent'] = $row->idcontent;

            array_push($response, $this->json_data);
        }
        if (empty($response)) {
            array_push($response, $this->json_data);
        }
        echo json_encode($response);
    }

    function simpanmetatagAndroid() {
        $xidx = $_POST['edidx'];
        $xmetakey = $_POST['edmetakey'];
        $xvalue = $_POST['edvalue'];
        $xidcontent = $_POST['edidcontent'];

        $this->load->helper('json');
        $this->load->model('modelmetatag');
        $response = array();
        if ($xidx != '0') {
            $this->modelmetatag->setUpdatemetatag($xidx, $xmetakey, $xvalue, $xidcontent);
        } else {
            $this->modelmetatag->setInsertmetatag($xidx, $xmetakey, $xvalue, $xidcontent);
        }
        $row = $this->modelmetatag->getLastIndexmetatag();
        $this->json_data['idx'] = $row->idx;
        $this->json_data['metakey'] = $row->metakey;
        $this->json_data['value'] = $row->value;
        $this->json_data['idcontent'] = $row->idcontent;

        $response = array();
        array_push($response, $this->json_data);

        echo json_encode($response);
    }

    function editrecmetatag() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelmetatag');
        $row = $this->modelmetatag->getDetailmetatag($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['metakey'] = $row->metakey;
        $this->json_data['value'] = $row->value;
        $this->json_data['idcontent'] = $row->idcontent;

        echo json_encode($this->json_data);
    }

    function deletetablemetatag() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelmetatag');
        $this->modelmetatag->setDeletemetatag($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchmetatag() {
        $xAwal = $_POST['xAwal'];
        $xSearch = $_POST['xSearch'];
        $this->load->helper('json');
        $xhalaman = @ceil($xAwal / ($xAwal - $this->session->userdata('awal', $xAwal)));
        $xlimit = $this->session->userdata('limit');
        $xHal = 1;
        if ($xAwal <= 0) {
            $xHal = 1;
        } else {
            $xHal = ($xhalaman + 1);
        }
        if ($xhalaman < 0) {
            $xHal = (($xhalaman - 1) * -1);
        }
        if (($xAwal + 0) == -99) {
            $xAwal = $this->session->userdata('awal', $xAwal);
            $xHal = $this->session->userdata('halaman', $xHal);
        }
        if ($xAwal + 0 <= -1) {
            $xAwal = 0;
            $this->session->set_userdata('awal', $xAwal);
        } else {
            $this->session->set_userdata('awal', $xAwal);
        }
        $this->json_data['tabledatametatag'] = $this->getlistmetatag($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal . ' to ' . ($xlimit * $xHal);
        echo json_encode($this->json_data);
    }

    function simpanmetatag() {
        $this->load->helper('json');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xmetakey = $_POST['edmetakey'];
        $xvalue = $_POST['edvalue'];
        $xidcontent = $_POST['edidcontent'];

        $this->load->model('modelmetatag');
        $idpegawai = $this->session->userdata('idpegawai');
        if (!empty($idpegawai)) {
            if ($xidx != '0') {
                $xStr = $this->modelmetatag->setUpdatemetatag($xidx, $xmetakey, $xvalue, $xidcontent);
            } else {
                $xStr = $this->modelmetatag->setInsertmetatag($xidx, $xmetakey, $xvalue, $xidcontent);
            }
        }
        echo json_encode(null);
    }
function getArraylistmetatag(){
//        $xAwal = $_POST['xAwal'];
        $xSearch = $_POST['edkeyword'];
        $this->load->helper('json');
        $this->load->model('modelmetatag');
        $idpegawai = $this->session->userdata('idpegawai');
            $query = $this->modelmetatag->getlistmetatagauto($xSearch);
        $xdata = array();
        foreach ($query->result() as $row) {
//            $array = explode(',', $row->value);
//            if (is_array($array)){
//                foreach (){
            $xdata[] = array('label' => $row->value, 'value' => $row->value);
//                }
//            }
        }
        $this->json_data['data'] = $xdata;
        echo json_encode($this->json_data);
}
}
