<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : kategori   *  By Diar */;

class ctrkategori extends CI_Controller {

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
        $this->createformkategori('0', $xAwal);
    }

    function createformkategori($xidx, $xAwal = 0, $xSearch = '') {
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
                
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxkategori.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormkategori($xidx), '', '', $xAddJs, '');
    }

    function setDetailFormkategori($xidx) {
        $this->load->helper('form');
        $this->load->model('modelkategori');
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform"><h3>kategori</h3><div class="garis"></div>' . form_open_multipart('ctrkategori/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />';

        $xBufResult .= setForm('edkategori', 'kategori', form_input(getArrayObj('edkategori', '', '200'))) . '<div class="spacer"></div>';

        $xBufResult .= setForm('edidparent', 'idparent', form_dropdown('edidparent', $this->modelkategori->getArrayListkategori(), '', 'id ="edidparent" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('eddeskripsi', 'deskripsi', form_textarea(getArrayObj('eddeskripsi', '', '200'))) . '<div class="spacer"></div>';

        $xBufResult .= setForm('edimage', 'image','<div id="uploadarea">' .form_input(getArrayObj('edimage', '', '200'), '', 'alt="Upload image "'). '</div>')  . '<div class="spacer"></div>';

        $xBufResult .= '<div class="garis"></div>' . form_button('btSimpan', 'simpan', 'onclick="dosimpankategori();"') . form_button('btNew', 'new', 'onclick="doClearkategori();"') . '<div class="spacer"></div><div id="tabledatakategori">' . $this->getlistkategori(0, '') . '</div><div class="spacer"></div>';
        return $xBufResult;
    }

    function getlistkategori($xAwal, $xSearch) {
        $xLimit = 10;
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('idx', '', 'width=10%') .
                tbaddcellhead('kategori', '', 'width=10%') .
                tbaddcellhead('idparent', '', 'width=10%') .
                tbaddcellhead('deskripsi', '', 'width=10%') .
                tbaddcellhead('image', '', 'width=10%') .
                tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelkategori');
        $this->load->model('basemodel');
        $xQuery = $this->modelkategori->getListkategori($xAwal, $xLimit, $xSearch);
        $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
        foreach ($xQuery->result() as $row) {
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditkategori(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapuskategori(\'' . $row->idx . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->kategori) .
                    tbaddcell($row->idparent) .
                    tbaddcell($row->deskripsi) .
                    tbaddcell('<img src="' . base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($row->image, 'thumb') . '" class="img-responsive" />') .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ''));
        $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchkategori(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
//$xButtonSearch = '<img src="' . base_url() . 'resource/imgbtn/b_view.png" alt="Search Data" onclick = "dosearchkategori(0);" style="border:none;width:30px;height:30px;" />';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchkategori(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchkategori(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . '&nbsp&nbsp' . $xButtonNext.'</div></div>';
        $xbufResult = tablegrid($xbufResult.'</tbody>').$xbuffoottable;
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>';
    }

    function getlistkategoriAndroid() {
        $this->load->helper('json');
        $xSearch = $_POST['search'];
        $xAwal = $_POST['start'];
        $xLimit = $_POST['limit'];
        $this->load->helper('form');
        $this->load->helper('common');
        $this->json_data['idx'] = "";
        $this->json_data['kategori'] = "";
        $this->json_data['idparent'] = "";
        $this->json_data['deskripsi'] = "";
        $this->json_data['image'] = "";

        $response = array();
        $this->load->model('modelkategori');
        $xQuery = $this->modelkategori->getListkategori($xAwal, $xLimit, $xSearch);
        foreach ($xQuery->result() as $row) {
            $this->json_data['idx'] = $row->idx;
            $this->json_data['kategori'] = $row->kategori;
            $this->json_data['idparent'] = $row->idparent;
            $this->json_data['deskripsi'] = $row->deskripsi;
            $this->json_data['image'] = $row->image;

            array_push($response, $this->json_data);
        }
        if (empty($response)) {
            array_push($response, $this->json_data);
        }
        echo json_encode($response);
    }

    function simpankategoriAndroid() {
        $xidx = $_POST['edidx'];
        $xkategori = $_POST['edkategori'];
        $xidparent = $_POST['edidparent'];
        $xdeskripsi = $_POST['eddeskripsi'];
        $ximage = $_POST['edimage'];

        $this->load->helper('json');
        $this->load->model('modelkategori');
        $response = array();
        if ($xidx != '0') {
            $this->modelkategori->setUpdatekategori($xidx, $xkategori, $xidparent, $xdeskripsi, $ximage);
        } else {
            $this->modelkategori->setInsertkategori($xidx, $xkategori, $xidparent, $xdeskripsi, $ximage);
        }
        $row = $this->modelkategori->getLastIndexkategori();
        $this->json_data['idx'] = $row->idx;
        $this->json_data['kategori'] = $row->kategori;
        $this->json_data['idparent'] = $row->idparent;
        $this->json_data['deskripsi'] = $row->deskripsi;
        $this->json_data['image'] = $row->image;

        $response = array();
        array_push($response, $this->json_data);

        echo json_encode($response);
    }

    function editreckategori() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelkategori');
        $row = $this->modelkategori->getDetailkategori($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['kategori'] = $row->kategori;
        $this->json_data['idparent'] = $row->idparent;
        $this->json_data['deskripsi'] = $row->deskripsi;
        $this->json_data['image'] = $row->image;

        echo json_encode($this->json_data);
    }

    function deletetablekategori() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelkategori');
        $this->modelkategori->setDeletekategori($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchkategori() {
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
        $this->json_data['tabledatakategori'] = $this->getlistkategori($xAwal, $xSearch);
        echo json_encode($this->json_data);
    }

    function simpankategori() {
        $this->load->helper('json');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xkategori = $_POST['edkategori'];
        $xidparent = $_POST['edidparent'];
        $xdeskripsi = $_POST['eddeskripsi'];
        $ximage = $_POST['edimage'];

        $this->load->model('modelkategori');
        $this->load->model('basemodel');
        $idpegawai = $this->session->userdata('idpegawai');
        if (!empty($idpegawai)) {
            if (!empty($ximage)) {
                $this->basemodel->imageresize(150, 150, $ximage);
                $this->basemodel->imageresize(350, 350, $ximage);
            }
            
            $ximage = str_replace('.', '', substr($ximage, 0, -5)) . substr($ximage, -5);
            
            if ($xidx != '0') {
                $xStr = $this->modelkategori->setUpdatekategori($xidx, $xkategori, $xidparent, $xdeskripsi, $ximage);
            } else {
                $xStr = $this->modelkategori->setInsertkategori($xidx, $xkategori, $xidparent, $xdeskripsi, $ximage);
            }
        }
        echo json_encode(null);
    }
function getlistkategoricombo(){
    $this->load->helper('json');
    $this->load->model('modelkategori');
    $xQuery = $this->modelkategori->getListkategori(0, 10, '');
    $xbufresult="";
    foreach($xQuery->result() as $row){
        
        if(empty($row->idparent)){
            $xbufresult .= '<div class="form-check"><input class="form-check-input left-label" type="checkbox" name="checkbox-'.$row->idx.'" id="checkbox-'.$row->idx.'">'
                    . '<label class="form-check-label" for="checkbox-'.$row->idx.'">'.$row->kategori.'</label></div>';
            $padding = 10;
            $xbufresult .= $this->getlistkategoricombochild($row->idx,$padding);
        }
    }
    $this->json_data["data"]=$xbufresult;
    echo json_encode($this->json_data);
}
function getlistkategoricombochild($xparent,$padding=''){
    $xQuery = $this->modelkategori->getListkategoribyparent($xparent);
        $xBufResult = "";
        $padding+=10;
        if (!empty($xQuery)) {
            foreach ($xQuery->result() as $row) {

                 $xBufResult .= '<div class="form-check"><input style="margin-left:'.$padding.'px" class="form-check-input left-label" type="checkbox" name="checkbox-'.$row->idx.'" id="checkbox-'.$row->idx.'">'
                         . '<label class="form-check-label" for="checkbox-'.$row->idx.'">'.$row->kategori.'</label></div>';
                 $xBufResult .= $this->getlistkategoricombochild($row->idx,$padding);
            }

            
        }
        return $xBufResult;
}
}
