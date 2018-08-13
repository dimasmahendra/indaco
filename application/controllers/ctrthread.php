<?php if (!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : event   *  By Diar */;

class ctrthread extends CI_Controller {

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
        $this->createformevent('0', $xAwal);
    }

    function createformevent($xidx, $xAwal = 0, $xSearch = '') {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->model('modelgetmenu');
        $xAddJs = 
            link_tag('resource/js/select2-develop/dist/css/select2.min.css') . 
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/tiny_mce/tiny_mce_src.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/tiny_mce/jquery.tinymce.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/select2-develop/dist/js/select2.min.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxmce2.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxtabs.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxthread.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormThread($xidx), '', '', $xAddJs, '', 'Program Thread');
    }

    function setDetailFormThread($xidx) {
        $this->load->helper('form');
        $this->load->model(array('modelpage', 'modelthread','modelevent'));
        $row = $this->modelpage->getDetailpage($xidx);
        $listartist = $this->modelthread->getAllListEvent();
        $isidropdown = '';
        foreach ($listartist as $val) {
            $isidropdown .= '<option value="' . $val['idx'] . '">' . $val['title_eng'] . '</option>';
        }
        $threaddropdown = '
            <select class="form-control artist-multiple" multiple="multiple" id="edidevent">' . 
            $isidropdown 
            . '</select>';
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform col-md-10">' . form_open_multipart('ctrthread/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<button name="btAddThread" id="btAddThread" type="button" class="btn btn-info">Add Thread</button>';
        $xBufResult .= '<div id="tabledatathread">' . $this->getlistthread(0, '') . '</div><div class="spacer"></div>';
        $xBufResult .= '<div class="tabs-area" style="display: none;">';
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="'.$xidx.'" />';  
        $xBufResult .= '
        <ul class="tabs">
            <li class="tab-link current" data-tab="tab-1">Indonesia</li>
            <li class="tab-link" data-tab="tab-2">English</li>
        </ul>';
        $xBufResult .= '<div id="tab-1" class="tab-content current">';  
        $xBufResult .= setForm('', 'Judul Content', form_input(getArrayObj('edtitleindo', '', '500'), '', '')) . '<div class="spacer"></div>';
        $xBufResult .= setForm('', '',  form_textarea(getArrayObj('eddescriptionindo', '', '500'), '', 'class="tinymce" placeholder="description" ')) . '<div class="spacer"></div>';
        $xBufResult .= '</div>';
        $xBufResult .= '<div id="tab-2" class="tab-content">';
        $xBufResult .= setForm('', 'Title Content', form_input(getArrayObj('edtitleeng', '', '500'), '', '')) . '<div class="spacer"></div>';
        $xBufResult .= setForm('', '',  form_textarea(getArrayObj('eddescriptioneng', '', '500'), '', 'class="tinymce" placeholder="description" ')) . '<div class="spacer"></div>';
        $xBufResult .= '</div>';
        $xBufResult .= '<div class="spacer"></div>';
        $xBufResult .= setForm('', 'Date', form_input(getArrayObj('edtanggal', '', '100'), '', 'class="date form-control"  placeholder="Date" ')) . '<div class="spacer"></div>';
        $xBufResult .= setForm('', 'Exhibition / Event', $threaddropdown) . '<div class="spacer"></div>';
        $xBufResult .= '</div><div class="clearfix"></div>'. form_button('btSimpan', 'Save', 'onclick="dosimpanthread();" style="display: none;"') . '<div class="spacer"></div>';
        $xBufResult .= '</div>';
        return $xBufResult;
    }

    function simpanthread() {
        $this->load->helper('json');
        $this->load->helper('common');
        $this->load->model('basemodel');
        $this->load->model('modelthread');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xtitleindo = $_POST['edtitleindo'];
        $xtitleeng = $_POST['edtitleeng'];
        $xdescindo = $_POST['eddescriptionindo'];
        $xdesceng = $_POST['eddescriptioneng'];
        $xevent = explode(",", $_POST['edidevent']);
        $xtanggal = $_POST['edtanggal'];
        
        $xiduser = $this->session->userdata('idpegawai');
        if (!empty($xiduser)) {
            if ($xidx != '0') {
                $xStr = $this->modelthread->setUpdatethread(
                    $xidx, $xtitleindo, $xtitleeng, $xdescindo, $xdesceng, datetomysql($xtanggal)
                );
                $delete_thread_event = $this->modelthread->setDeleteThreadEvent($xidx);
                foreach ($xevent as $key => $value) {
                    $insertThreatEvent = $this->modelthread->setInsertThreadEvent($xidx,$value);
                }
            } else {
                $xStr = $this->modelthread->setInsertevent(
                    $xtitleindo, $xtitleeng, $xdescindo, $xdesceng, datetomysql($xtanggal)
                );
                foreach ($xevent as $key => $value) {
                    $insertThreatEvent = $this->modelthread->setInsertThreadEvent($xStr,$value);
                }
            }
        }
        echo json_encode(null);
    }

    function getlistthread($xAwal, $xSearch) {
        $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('id', '', 'data-field="idx" data-sortable="true" width=10%') .
            tbaddcellhead('title', '', 'data-field="title" data-sortable="true" width=10%') .
            tbaddcellhead('tanggal', '', 'data-field="tanggal" data-sortable="true" width=10%') .
            tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelthread');
        $this->load->model('basemodel');
        $this->load->model('modelusersistem');
        
        $xQuery = $this->modelthread->getListthread($xAwal, $xLimit, $xSearch);
        $xbufResult = '<thead>' . $xbufResult1 . '</thead>';
        $xbufResult .= '<tbody>';
        foreach ($xQuery->result() as $row) {
            $rowuser = $this->modelusersistem->getDetailusersistem($row->idx);
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" class="bteditthread" onclick = "doeditthread(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusevent(\'' . $row->idx . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->title_ind) .
                    tbaddcell($row->tanggal) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ' '));
        $xButtonSearch = '<span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick = "dosearchthread(0);"><i class="fa fa-search"></i>
                            </button>
                        </span>';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchthread(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>' . $xAwal . ' to ' . $xLimit . '</button>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchthread(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">' . setForm('', '', $xInput . $xButtonSearch, '', '') . '</div>' .
                '<div class="col-md-6">' . $xButtonPrev . $xButtonhalaman . $xButtonNext . '</div></div>';
        $xbufResult = tablegrid($xbufResult . '</tbody>', '', 'id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>' . '<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"><img class="center-block img-responsive" src="" id="imagepreview" alt="preview" /></div></div>';
    }

    function editrecthread() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelthread');
        $row = $this->modelthread->getDetailThread($xIdEdit);
        $event = implode(",", $this->modelthread->getthreadselected($xIdEdit));
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['title_ind'] = $row->title_ind;
        $this->json_data['title_eng'] = $row->title_eng;
        $this->json_data['content_ind'] = $row->content_ind;
        $this->json_data['content_eng'] = $row->content_eng;
        $this->json_data['event'] = $event;
        $this->json_data['tanggal'] = $row->tanggal;
        echo json_encode($this->json_data);
    }    

    function deletetableevent() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelevent');
        $this->modelevent->setDeleteevent($edidx);
        $this->modelevent->setDeleteeventartist($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchthread() {
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
        $this->json_data['tabledatathread'] = $this->getlistthread($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal . ' to ' . ($xlimit * $xHal);
        echo json_encode($this->json_data);
    }
}