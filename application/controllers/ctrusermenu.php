<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : usermenu  * di Buat oleh Diar PHP Generator * Update List untuk grid karena program generatorku lom sempurna ya hehehehehe */

class ctrusermenu extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($xAwal=0, $xSearch='') {
//  $this->load->view('test.php');
        $idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
            redirect(site_url(), '');
        }
        if ($xAwal <= -1) {
            $xAwal = 0;
        } $this->session->set_userdata('awal', $xAwal);
        //$this->createformmenu('0', $xAwal);
        $this->createform('0', $xAwal);
    }

    function createform($xidx, $xAwal=0, $xSearch='') {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('modelgetmenu');
        $xForm = '<div id="stylized" class="myform"><h3>Setting Priviledges Menu User</h3>' . form_open_multipart('ctrusermenu/inserttable', array('id' => 'form', 'name' => 'form')) . '<div class="garis"></div>';
        $xAddJs =
                link_tag('resource/css/admin/jquery.checkboxtree.css') . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxusermenu.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/jquery.checkboxtree.js"></script>' . "\n" . '';
        echo $this->modelgetmenu->SetViewAdmin($xForm . $this->setDetailFormusermenu($xidx), '', '', $xAddJs, '');
    }

    function setDetailFormusermenu($xidx) {
        $this->load->helper('form');
        $this->load->model('modelusermenu');
        $row = $this->modelusermenu->getDetailusermenu($xidx);
        $xBufResult = '';
        if (empty($row)) {
            $xidx = '0';
            $xiduser = '';
            $xidmenu = '';
        } else {
            $xidx = $row->idx;
            $xiduser = $row->iduser;
            $xidmenu = $row->idmenu;
        }
        $this->load->helper('common');
        $this->load->model('modelusersistem');
        $this->load->model('modelusergroup');
        $xBufResult = '<input type="hidden" name="edidx" id="edidx" value="0" />';
        $xBufResult .= setForm('NamaUser', 'Nama User', form_dropdown('ediduser', $this->modelusergroup->getArrayListusergroup(), '0', 'id="ediduser" style="width:300px;" onchange="setcheckmenu();"')) . '<div class="spacer"></div>';
        //$xBufResult .= setForm('edidmenu', 'idmenu', form_input(getArrayObj('edidmenu', $xidmenu, '100'))) . '<div class="spacer"></div>';
        $xBufResult .= '<div id="chkmenu">' . $this->setChecboxMenu() . '</div>';
        $xBufResult .= '<div class="garis"></div>' . form_button('btSimpan', 'Simpan', 'onclick="dosimpan();"') . '<div class="spacer"></div>';
        return $xBufResult;
    }

    function setChecboxMenu() {

        $this->load->model('modelmenu');
        $xQuery = $this->modelmenu->getListmenu(0, 100);
        $xbufResult = '<div id="chkmenu">';

        foreach ($xQuery->result() as $row) {

            //$xBuffResul[$row->nmmenu] = $row->nmmenu;
            $xbufResult .= form_checkbox(getArrayObjCheckBox($row->nmmenu, $row->idmenu, FALSE, 0)) . $row->nmmenu . '<div class="spacer"></div>'; //form_checkbox( $row->nmmenu, $row->idmenu);
        }
        $xbufResult .='</div>';
        $this->load->model('modelmenu');
        return $this->modelmenu->getMenuForTree();
        //return '<div id="browser"> <div id="lstreeview" name="lstreeview" class="treev">' . $this->modelgetmenu->getMenuForTree() . '</div></div>';
    }

    function getlistusermenu($xAwal, $xSearch) {
        $xLimit = 3;
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult = addRow(addCell('idx', 'width:100px;', true) .
                        addCell('iduser', 'width:100px;', true) .
                        addCell('idmenu', 'width:100px;', true) .
                        addCell('Edit/Hapus', 'width:100px;text-align:center;', true));
        $this->load->model('modelusermenu');
        $xQuery = $this->modelusermenu->getListusermenu($xAwal, $xLimit, $xSearch);
        foreach ($xQuery->result() as $row) {
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doedit(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapus(\'' . $row->idx . '\',\'' . substr($row->iduser, 0, 20) . '\');" style="border:none;">';
            $xbufResult .= addRow(addCell($row->idx, 'width:100px;') .
                            addCell($row->iduser, 'width:100px;') .
                            addCell($row->idmenu, 'width:100px;') .
                            addCell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus, 'width:100px;'));
        }
        $xButtonADD = '<img src="' . base_url() . 'resource/imgbtn/document-new.png" onclick = "doClear();" style="border:none;" />';
        $xInput = form_input(getArrayObj('edSearch', '', '150'));
        $xButtonSearch = '<img src="' . base_url() . 'resource/imgbtn/b_view.png" alt="Search Data" onclick = "dosearch(0);" style="border:none;" />';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearch(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearch(' . ($xAwal + $xLimit) . ');" />';
        $xRowCells = addCell($xButtonADD, 'width:100px;', true) .
                addCell($xInput, 'width:200px;border-right:0px;', true) .
                addCell($xButtonSearch, 'width:260px;border-right:0px;border-left:0px;', true) .
                addCell($xButtonPrev . '&nbsp&nbsp' . $xButtonNext, 'width:100px;border-left:0px;', true)
        ;
        return '<div id="tabledata" name ="tabledata" class="tc1" style="width:415px;">' . $xbufResult . $xRowCells . '</div>';
    }

    function actionrecord($xIdRec='', $xAction='') {
        $this->load->model('modelusermenu');
        switch ($xAction) {
            case 'edit':
                $this->createform($xIdRec, $this->session->userdata('awal'));
                break;
            case 'hapus':
                $this->modelusermenu->setDeleteusermenu($xIdRec);
                $this->createform('0');
                break;
            case 'search' :
                $this->createform('0', '0', $xIdRec);
                break;
        }
    }

    function editrec() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelusermenu');
        $row = $this->modelusermenu->getDetailusermenu($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['iduser'] = $row->iduser;
        $this->json_data['idmenu'] = $row->idmenu;
        echo json_encode($this->json_data);
    }

    function deletetable() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelusermenu');
        $this->modelusermenu->setDeleteusermenu($edidx);
    }

    function search() {
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
        $this->json_data['tabledata'] = $this->getlistusermenu($xAwal, $xSearch);
        echo json_encode($this->json_data);
    }

    function isinmenu() {
        $this->load->helper('json');
        $this->load->model('modelusermenu');
        $iduser = $_POST['xiduser'];
        $idmenu = $_POST['xidmenu'];
        $idmenu = substr($idmenu, 2, strlen($idmenu));
        //echo $iduser." bla bla ".$idmenu." --";
        $xrow = $this->modelusermenu->getDetailusermenubyidmnusr(trim($idmenu), $iduser);
        if (!empty($xrow->iduser)) {
            $this->json_data['isinmenu'] = true;
            $this->json_data['idmenu'] = $xrow->idmenu;
        } else {
            $this->json_data['isinmenu'] = false;
            $this->json_data['idmenu'] = $idmenu;
        }

        echo json_encode($this->json_data);
    }

    function simpan() {
        $this->load->helper('json');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $this->load->model('modelusermenu');
        $this->load->model('modelmenu');

        $xiduser = $_POST['ediduser'];

        $this->modelusermenu->setDeleteusermenubyuser($xiduser);

        $xQuery = $this->modelmenu->getListmenux();
        foreach ($xQuery->result() as $row) {
         if (isset($_POST['mn' . $row->idmenu])) {
                $xidmenu = $_POST['mn' . $row->idmenu];
                $xStr = $this->modelusermenu->setInsertusermenu($xidx, $xiduser, $row->idmenu);
                
            }
        }
//        if ($xidx != '0') {
//            $xStr = $this->modelusermenu->setUpdateusermenu($xidx, $xiduser, $xidmenu);
//        } else {
//            $xStr = $this->modelusermenu->setInsertusermenu($xidx, $xiduser, $xidmenu);
//        }
        echo json_encode(null);
    }

}

?>