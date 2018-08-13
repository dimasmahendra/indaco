<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : categoryevent   *  By Diar */;

class ctrcategoryevent extends CI_Controller {

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
        $this->createformcategoryevent('0', $xAwal);
    }

    function createformcategoryevent($xidx, $xAwal = 0, $xSearch = '') {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('modelgetmenu');
        $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
                link_tag('resource/css/admin/upload/css/upload.css') . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.fileupload.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/myupload.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxcategoryevent.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormcategoryevent($xidx), '', '', $xAddJs, '', 'categoryevent');
    }

    function setDetailFormcategoryevent($xidx) {
        $this->load->helper('form');
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform">' . form_open_multipart('ctrcategoryevent/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />';

        $xBufResult .= setForm('categoryevent', 'categoryevent', form_input(getArrayObj('edcategoryevent', '', '200'), '', ' placeholder="categoryevent" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('description', 'description', form_textarea(getArrayObj('eddescription', '', '200'), '', ' placeholder="description" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('image', '', '<div id="uploadarea">'.form_input(getArrayObj('edimage', '', '200'), '', 'class="uploadimage" alt="upload area" ').'</div>') . '<div class="spacer"></div>';

        $xBufResult .= setForm('slug', 'slug', form_input(getArrayObj('edslug', '', '200'), '', ' placeholder="slug" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('idparent', 'idparent', form_dropdown('edidparent', array(), '',''), '', 'id="edidparent" placeholder="idparent" ') . '<div class="spacer"></div>';

        $xBufResult .= setForm('idbahasa', 'idbahasa', form_dropdown('edidbahasa', array(), '',''), '', 'id="edidbahasa" placeholder="idbahasa" ') . '<div class="spacer"></div>';

        $xBufResult .= '<div class="garis"></div>' . form_button('btSimpan', 'simpan', 'onclick="dosimpancategoryevent();"') . form_button('btNew', 'new', 'onclick="doClearcategoryevent();"') . '<div class="spacer"></div><div id="tabledatacategoryevent">' . $this->getlistcategoryevent(0, '') . '</div><div class="spacer"></div>';
        return $xBufResult;
    }

    function getlistcategoryevent($xAwal, $xSearch) {
        $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('idx', '', 'data-field="idx" data-sortable="true" width=10%') .
                tbaddcellhead('categoryevent', '', 'data-field="categoryevent" data-sortable="true" width=10%') .
                tbaddcellhead('description', '', 'data-field="description" data-sortable="true" width=10%') .
                tbaddcellhead('image', '', 'data-field="image" data-sortable="true" width=10%') .
                tbaddcellhead('slug', '', 'data-field="slug" data-sortable="true" width=10%') .
                tbaddcellhead('idparent', '', 'data-field="idparent" data-sortable="true" width=10%') .
                tbaddcellhead('idbahasa', '', 'data-field="idbahasa" data-sortable="true" width=10%') .
                tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelcategoryevent');
        $xQuery = $this->modelcategoryevent->getListcategoryevent($xAwal, $xLimit, $xSearch);
        $xbufResult = '<thead>' . $xbufResult1 . '</thead>';
        $xbufResult .= '<tbody>';
        foreach ($xQuery->result() as $row) {
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditcategoryevent(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapuscategoryevent(\'' . $row->idx . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->categoryevent) .
                    tbaddcell($row->description) .
                    tbaddcell($row->image) .
                    tbaddcell($row->slug) .
                    tbaddcell(@$row->idparent) .
                    tbaddcell(@$row->idbahasa) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ' '));
        $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchcategoryevent(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchcategoryevent(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>' . $xAwal . ' to ' . $xLimit . '</button>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchcategoryevent(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">' . setForm('', '', $xInput . $xButtonSearch, '', '') . '</div>' .
                '<div class="col-md-6">' . $xButtonPrev . $xButtonhalaman . $xButtonNext . '</div></div>';

        $xbufResult = tablegrid($xbufResult . '</tbody>', '', 'id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';

        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>' . '<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
    }

    function getlistcategoryeventAndroid() {
        $this->load->helper('json');
        $xSearch = $_POST['search'];
        $xAwal = $_POST['start'];
        $xLimit = $_POST['limit'];
        $this->load->helper('form');
        $this->load->helper('common');
        $this->json_data['idx'] = "";
        $this->json_data['categoryevent'] = "";
        $this->json_data['description'] = "";
        $this->json_data['image'] = "";
        $this->json_data['slug'] = "";
        $this->json_data['idparent'] = "";
        $this->json_data['idbahasa'] = "";

        $response = array();
        $this->load->model('modelcategoryevent');
        $xQuery = $this->modelcategoryevent->getListcategoryevent($xAwal, $xLimit, $xSearch);
        foreach ($xQuery->result() as $row) {
            $this->json_data['idx'] = $row->idx;
            $this->json_data['categoryevent'] = $row->categoryevent;
            $this->json_data['description'] = $row->description;
            $this->json_data['image'] = $row->image;
            $this->json_data['slug'] = $row->slug;
            $this->json_data['idparent'] = $row->idparent;
            $this->json_data['idbahasa'] = $row->idbahasa;

            array_push($response, $this->json_data);
        }
        if (empty($response)) {
            array_push($response, $this->json_data);
        }
        echo json_encode($response);
    }

    function simpancategoryeventAndroid() {
        $xidx = $_POST['edidx'];
        $xcategoryevent = $_POST['edcategoryevent'];
        $xdescription = $_POST['eddescription'];
        $ximage = $_POST['edimage'];
        $xslug = $_POST['edslug'];
        $xidparent = $_POST['edidparent'];
        $xidbahasa = $_POST['edidbahasa'];

        $this->load->helper('json');
        $this->load->model('modelcategoryevent');
        $response = array();
        if ($xidx != '0') {
            $this->modelcategoryevent->setUpdatecategoryevent($xidx, $xcategoryevent, $xdescription, $ximage, $xslug, $xidparent, $xidbahasa);
        } else {
            $this->modelcategoryevent->setInsertcategoryevent($xidx, $xcategoryevent, $xdescription, $ximage, $xslug, $xidparent, $xidbahasa);
        }
        $row = $this->modelcategoryevent->getLastIndexcategoryevent();
        $this->json_data['idx'] = $row->idx;
        $this->json_data['categoryevent'] = $row->categoryevent;
        $this->json_data['description'] = $row->description;
        $this->json_data['image'] = $row->image;
        $this->json_data['slug'] = $row->slug;
        $this->json_data['idparent'] = $row->idparent;
        $this->json_data['idbahasa'] = $row->idbahasa;

        $response = array();
        array_push($response, $this->json_data);

        echo json_encode($response);
    }

    function editreccategoryevent() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelcategoryevent');
        $row = $this->modelcategoryevent->getDetailcategoryevent($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['categoryevent'] = $row->categoryevent;
        $this->json_data['description'] = $row->description;
        $this->json_data['image'] = $row->image;
        $this->json_data['slug'] = $row->slug;
        $this->json_data['idparent'] = $row->idparent;
        $this->json_data['idbahasa'] = $row->idbahasa;

        echo json_encode($this->json_data);
    }

    function deletetablecategoryevent() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelcategoryevent');
        $this->modelcategoryevent->setDeletecategoryevent($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchcategoryevent() {
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
        $this->json_data['tabledatacategoryevent'] = $this->getlistcategoryevent($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal . ' to ' . ($xlimit * $xHal);
        echo json_encode($this->json_data);
    }

    function simpancategoryevent() {
        $this->load->helper('json');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xcategoryevent = $_POST['edcategoryevent'];
        $xdescription = $_POST['eddescription'];
        $ximage = $_POST['edimage'];
        $xslug = $_POST['edslug'];
        $xidparent = $_POST['edidparent'];
        $xidbahasa = $_POST['edidbahasa'];

        $this->load->model('modelcategoryevent');
        $idpegawai = $this->session->userdata('idpegawai');
        if (!empty($idpegawai)) {
            if ($xidx != '0') {
                $xStr = $this->modelcategoryevent->setUpdatecategoryevent($xidx, $xcategoryevent, $xdescription, $ximage, $xslug, $xidparent, $xidbahasa);
            } else {
                $xStr = $this->modelcategoryevent->setInsertcategoryevent($xidx, $xcategoryevent, $xdescription, $ximage, $xslug, $xidparent, $xidbahasa);
            }
        }
        echo json_encode(null);
    }
function getlistkategorieventcombo(){
    $this->load->helper('json');
    $this->load->model('modelcategoryevent');
    $xQuery = $this->modelcategoryevent->getListcategoryevent(0, 10, '');
    $xbufresult="";
    foreach($xQuery->result() as $row){
        
        if(empty($row->idparent)){
            $xbufresult .= '<div class="form-check"><input class="form-check-input left-label" type="checkbox" name="checkbox-'.$row->idx.'" id="checkbox-'.$row->idx.'">'
                    . '<label class="form-check-label" for="checkbox-'.$row->idx.'">'.$row->kategori.'</label></div>';
            $padding = 10;
            $xbufresult .= $this->getlistkategorieventcombochild($row->idx,$padding);
        }
    }
    $this->json_data["data"]=$xbufresult;
    echo json_encode($this->json_data);
}
function getlistkategorieventcombochild($xparent,$padding=''){
    $this->load->model('modelcategoryevent');
    
    $xQuery = $this->modelcategoryevent->getListcategoryeventbyparent($xparent);
        $xBufResult = "";
        $padding+=10;
        if (!empty($xQuery)) {
            foreach ($xQuery->result() as $row) {

                 $xBufResult .= '<div class="form-check"><input style="margin-left:'.$padding.'px" class="form-check-input left-label" type="checkbox" name="checkbox-'.$row->idx.'" id="checkbox-'.$row->idx.'">'
                         . '<label class="form-check-label" for="checkbox-'.$row->idx.'">'.$row->kategori.'</label></div>';
                 $xBufResult .= $this->getlistkategorieventcombochild($row->idx,$padding);
            }

            
        }
        return $xBufResult;
}
}
