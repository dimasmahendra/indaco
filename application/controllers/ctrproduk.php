<?php if (!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : event   *  By Diar */;

class ctrproduk extends CI_Controller {

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
        $this->createformproduk('0', $xAwal);
    }

    function createformproduk($xidx, $xAwal = 0, $xSearch = '') {
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
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.fileupload.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/myuploadfile.js"></script>' . "\n" .
            '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxproduk.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormProduk($xidx), '', '', $xAddJs, '', 'Product Type');
    }

    function setDetailFormProduk($xidx) {
        $this->load->helper('form');
        $this->load->model(array('modelpage', 'modelproduk'));
        
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform col-md-10">' . form_open_multipart('ctrproduk/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<button name="btAddProduk" id="btAddProduk" type="button" class="btn btn-info">Add Product Type</button>';
        $xBufResult .= '<div id="tabledataproduk">' . $this->getlistproduk(0, '') . '</div><div class="spacer"></div>';
        $xBufResult .= '<div class="tabs-area" style="display: none;">';
        $xBufResult .= setForm('', 'Name', form_input(getArrayObj('edname', '', '500'), '', '')) . '<div class="spacer"></div>';
        $xBufResult .= '<input type="hidden" name="edid" id="edid" value="'.$xidx.'" />';
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
        $xBufResult .= setForm('image', '', '<div id="uploadarea">'.form_input(getArrayObj('edimage', '', '200'), '', 'class="uploadimage" alt="upload area" ').'</div>') . '<div class="spacer"></div>';
        $xBufResult .= '<div class="spacer"></div>';
        $xBufResult .= '</div><div class="clearfix"></div>'. form_button('btSimpan', 'Save', 'onclick="dosimpanproduk();" style="display: none;"') . '<div class="spacer"></div>';
        $xBufResult .= '</div>';
        return $xBufResult;
    }

    function simpanproduk() {
        $this->load->helper('json');
        $this->load->helper('common');
        $this->load->model('basemodel');
        $this->load->model('modelevent');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xtitleindo = $_POST['edtitleindo'];
        $xtitleeng = $_POST['edtitleeng'];
        $xdescindo = $_POST['eddescriptionindo'];
        $xdesceng = $_POST['eddescriptioneng'];
        $xidkat = $_POST['edidkategori'];
        $xartis = explode(",", $_POST['edidartist']);
        $xtanggal = $_POST['edtanggal'];
        
        $xiduser = $this->session->userdata('idpegawai');
        if (!empty($xiduser)) {
            if ($xidx != '0') {
                $xStr = $this->modelevent->setUpdateevent(
                    $xidx, $xtitleindo, $xtitleeng, $xdescindo, $xdesceng, $xidkat, datetomysql($xtanggal)
                );
                $delete_event_artist = $this->modelevent->setDeleteeventartist($xidx);
                foreach ($xartis as $key => $value) {
                    $insertEventArtis = $this->modelevent->setInsertEventArtist($xidx,$value);
                }
            } else {
                $xStr = $this->modelevent->setInsertevent(
                    $xtitleindo, $xtitleeng, $xdescindo, $xdesceng, $xidkat, datetomysql($xtanggal)
                );
                foreach ($xartis as $key => $value) {
                    $insertEventArtis = $this->modelevent->setInsertEventArtist($xStr,$value);
                }
            }
        }
        echo json_encode(null);
    }

    function getlistproduk($xAwal, $xSearch) {
        $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('id', '', 'data-field="idx" data-sortable="true" width=10%') .
            tbaddcellhead('name', '', 'data-field="name" data-sortable="true" width=10%') .
            tbaddcellhead('title', '', 'data-field="ind_title" data-sortable="true" width=10%') .
            tbaddcellhead('description', '', 'data-field="ind_description" data-sortable="true" width=10%') .
            tbaddcellhead('Edit/Hapus', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelproduk');
        $this->load->model('basemodel');
        $this->load->model('modelusersistem');
        //$this->load->model('modelbahasa');
        $xQuery = $this->modelproduk->getListProduk($xAwal, $xLimit, $xSearch);
        $xbufResult = '<thead>' . $xbufResult1 . '</thead>';
        $xbufResult .= '<tbody>';
        foreach ($xQuery->result() as $row) {
            
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" class="bteditevent" onclick = "doeditevent(\'' . $row->id . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusevent(\'' . $row->id . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->id) .
                    tbaddcell($row->name) .
                    tbaddcell($row->ind_title) .
                    tbaddcell($row->ind_description) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ' '));
        $xButtonSearch = '<span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick = "dosearchproduk(0);"><i class="fa fa-search"></i>
                            </button>
                        </span>';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchproduk(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>' . $xAwal . ' to ' . $xLimit . '</button>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchproduk(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">' . setForm('', '', $xInput . $xButtonSearch, '', '') . '</div>' .
                '<div class="col-md-6">' . $xButtonPrev . $xButtonhalaman . $xButtonNext . '</div></div>';
        $xbufResult = tablegrid($xbufResult . '</tbody>', '', 'id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>' . '<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"><img class="center-block img-responsive" src="" id="imagepreview" alt="preview" /></div></div>';
    }

    function editrecevent() {
        $xIdEdit = $_POST['edidx'];
        $this->load->model('modelevent');
        $row = $this->modelevent->getDetailevent($xIdEdit);
        $artist = implode(",", $this->modelevent->getartistselected($xIdEdit));
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['title_ind'] = $row->title_ind;
        $this->json_data['title_eng'] = $row->title_eng;
        $this->json_data['description_ind'] = $row->description_ind;
        $this->json_data['description_eng'] = $row->description_eng;
        $this->json_data['kategori'] = $row->kategori;
        $this->json_data['artist'] = $artist;
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

    function searchevent() {
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
        $this->json_data['tabledataevent'] = $this->getlistproduk($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal . ' to ' . ($xlimit * $xHal);
        echo json_encode($this->json_data);
    }
}