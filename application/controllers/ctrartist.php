<?php if (!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : event   *  By Diar */;

class ctrartist extends CI_Controller {

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
        $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
            link_tag('resource/css/admin/upload/css/upload.css') . "\n" .
            link_tag('resource/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/tiny_mce/tiny_mce_src.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/tiny_mce/jquery.tinymce.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxmce2.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxtabs.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxartist.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormevent($xidx), '', '', $xAddJs, '', 'Artist');
    }

    function setDetailFormevent($xidx) {
        $this->load->helper('form');
        $this->load->model('modelpage');
        $row = $this->modelpage->getDetailpage($xidx);
        $radio = '<input type="radio" name="edidsex" value="0"> Male <input type="radio" name="edidsex" value="1"> Female';
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform col-md-10">' . form_open_multipart('ctrartist/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<button name="btAddArtist" id="btAddArtist" type="button" class="btn btn-info">Add Artist</button>';
        $xBufResult .= '<div id="tabledataartist">' . $this->getlistevent(0, '') . '</div><div class="spacer"></div>';
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="'.$xidx.'" />';
        $xBufResult .= '<div class="tabs-area" style="display: none;">';
        $xBufResult .= setForm('', 'Name', form_input(getArrayObj('edartistname', '', '500'), '', '')) . '<div class="spacer"></div>';
        $xBufResult .= setForm('', 'Address', form_input(getArrayObj('edartistaddress', '', '500'), '', '')) . '<div class="spacer"></div>';
        $xBufResult .= setForm('', 'Sex', $radio) . '<div class="spacer"></div>';
        $xBufResult .= setForm('', 'Birth Date', form_input(getArrayObj('edtanggalartist', '', '100'), '', 'class="date form-control"  placeholder="Date" ')) . '<div class="spacer"></div>';
        $xBufResult .= '</div>';
        $xBufResult .= '<div class="spacer"></div>';
        $xBufResult .= '</div><div class="clearfix"></div>'. form_button('btSimpan', 'Save', 'onclick="dosimpanartist();" style="display: none;"') . '<div class="spacer"></div>';
        $xBufResult .= '</div>';
        return $xBufResult;
    }

    function simpanartist() {
        $this->load->helper('json');
        $this->load->helper('common');
        $this->load->model('basemodel');
        $this->load->model('modelartist');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xnameartist = $_POST['edartistname'];
        $xaddressartist = $_POST['edartistaddress'];
        $xsex = $_POST['edidsex'];
        $xtanggalartist = $_POST['edtanggalartist'];
        
        $xiduser = $this->session->userdata('idpegawai');
        if (!empty($xiduser)) {
            if ($xidx != '0') {
                $xStr = $this->modelartist->setUpdateartist(
                    $xidx, $xnameartist, $xaddressartist, $xsex, datetomysql($xtanggalartist)
                );
            } else {
                $xStr = $this->modelartist->setInsertartist(
                    $xnameartist, $xaddressartist, $xsex, datetomysql($xtanggalartist)
                );
            }
        }
        echo json_encode(null);
    }

    function getlistevent($xAwal, $xSearch) {
        $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('Id', '', 'data-field="idx" data-sortable="true" width=10%') .
            tbaddcellhead('Name', '', 'data-field="name" data-sortable="true" width=10%') .
            tbaddcellhead('Address', '', 'data-field="address" data-sortable="true" width=10%') .
            tbaddcellhead('Sex', '', 'data-field="sex" data-sortable="true" width=10%') .
            tbaddcellhead('Birth Date', '', 'data-field="birthdate" data-sortable="true" width=10%') .
            tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelartist');
        $this->load->model('basemodel');
        $this->load->model('modelusersistem');
        
        $xQuery = $this->modelartist->getListevent($xAwal, $xLimit, $xSearch);
        $xbufResult = '<thead>' . $xbufResult1 . '</thead>';
        $xbufResult .= '<tbody>';
        foreach ($xQuery->result() as $row) {
            $rowuser = $this->modelusersistem->getDetailusersistem($row->idx);
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" class="bteditaartis" onclick = "doeditartist(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusartist(\'' . $row->idx . '\');" style="border:none;">';
            if ($row->sex == 0) {
                $jeniskelamin = "Male";
            }
            else {
                $jeniskelamin = "Female";
            }
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->name) .
                    tbaddcell($row->address) .
                    tbaddcell($jeniskelamin) .
                    tbaddcell($row->birthdate) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ' '));
        $xButtonSearch = '<span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick = "dosearchartist(0);"><i class="fa fa-search"></i>
                            </button>
                        </span>';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchartist(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>' . $xAwal . ' to ' . $xLimit . '</button>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchartist(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">' . setForm('', '', $xInput . $xButtonSearch, '', '') . '</div>' .
                '<div class="col-md-6">' . $xButtonPrev . $xButtonhalaman . $xButtonNext . '</div></div>';
        $xbufResult = tablegrid($xbufResult . '</tbody>', '', 'id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>' . '<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"><img class="center-block img-responsive" src="" id="imagepreview" alt="preview" /></div></div>';
    }

    function editrecartist() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelartist');
        $row = $this->modelartist->getDetailArtist($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['name'] = $row->name;
        $this->json_data['address'] = $row->address;
        $this->json_data['sex'] = $row->sex;
        $this->json_data['birthdate'] = $row->birthdate;
        echo json_encode($this->json_data);
    }    

    function deletetableartist() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelartist');
        $this->modelartist->setDeleteartist($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchartist() {
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
        $this->json_data['tabledataartist'] = $this->getlistevent($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal . ' to ' . ($xlimit * $xHal);
        echo json_encode($this->json_data);
    }
}