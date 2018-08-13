<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Control : page   *  By Diar */;

class ctrpage extends CI_Controller {

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
        $this->createformpage('0', $xAwal);
    }

    function createformpage($xidx, $xAwal = 0, $xSearch = '') {
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
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.fileupload.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/myupload.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxpage.js"></script>';
        echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormpage($xidx), '', '', $xAddJs, '', 'page');
    }

    function setDetailFormpage($xidx) {
        $this->load->helper('form');
        $this->load->model('modelbahasa');
        $this->load->model('modelpage');
        $row = $this->modelpage->getDetailpage($xidx);
        $xBufResult = '';
        $xBufResult = '<div id="stylized" class="myform col-md-10">' . form_open_multipart('ctrpage/inserttable', array('id' => 'form', 'name' => 'form'));
        $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />';

        $xBufResult .= setForm('', '', form_input(getArrayObj('edtitle', '', '500'), '', ' placeholder="title" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('', '',  form_textarea(getArrayObj('eddescription', '', '300'), '', 'class="tinymce" placeholder="description" ')) . '<div class="spacer"></div>';

        $xBufResult .= setForm('', '', form_input(getArrayObj('edkeyword', '', '500'), '', ' class="bootstrap-tagsinput form-control" placeholder="keyword" onkeydown="autotag();" data-role="tagsinput"')) . '<div class="spacer"></div>';
        
        
         $xBufResult .= "</div><div class='col-md-2'>";
        $xBufResult .= setForm('Publish', '', form_checkbox('edistampil', @$row->istampil, true), '', ' placeholder="istampil" ') . '<div class="spacer"></div>';
        $xBufResult .= setForm('', '', form_input(getArrayObj('eddate', '', '100'), '', 'class="date form-control" placeholder="date" ')) . '<div class="spacer"></div>';
        $xBufResult .= setForm('', '', form_dropdown('edidbahasa', $this->modelbahasa->getArraylistbahasa(), @$row->idbahasa," id='edidbahasa' "), '', ' placeholder="idbahasa" ') . '<div class="spacer"></div>';

        $xBufResult .= '<h3>Category</h3><div id="showkategori" class="form-group"></div>';
//        $xBufResult .= setForm('idmetatag', 'idmetatag', form_input(getArrayObj('edidmetatag', '', '200'), '', ' placeholder="idmetatag" ')) . '<div class="spacer"></div>';

//        $xBufResult .= setForm('idkategoripage', 'idkategoripage', form_input(getArrayObj('edidkategoripage', '', '200'), '', ' placeholder="idkategoripage" ')) . '<div class="spacer"></div>';
        $xBufResult .= setForm('image', '', '<div id="uploadarea">'.form_input(getArrayObj('edimage', '', '200'), '', 'class="uploadimage" alt="upload area" ').'</div>') . '<div class="spacer"></div>';
//        $xBufResult .= setForm('idimage', 'idimage', form_input(getArrayObj('edidimage', '', '200'), '', ' placeholder="idimage" ')) . '<div class="spacer"></div>';

//        $xBufResult .= setForm('update', 'update', form_input(getArrayObj('edupdate', '', '200'), '', ' placeholder="update" ')) . '<div class="spacer"></div>';

//        $xBufResult .= setForm('iduser', 'iduser', form_input(getArrayObj('ediduser', '', '200'), '', ' placeholder="iduser" ')) . '<div class="spacer"></div>';

        $xBufResult .=  '</div><div class="clearfix"></div>'.form_button('btSimpan', 'Save', 'onclick="dosimpanpage();"') . form_button('btNew', 'Clear', 'onclick="doClearpage();"') . '<div class="spacer"></div><div id="tabledatapage">' . $this->getlistpage(0, '') . '</div><div class="spacer"></div>';
        return $xBufResult;
    }

    function getlistpage($xAwal, $xSearch) {
        $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
        $xbufResult1 = tbaddrow(tbaddcellhead('Id', '', 'data-field="idx" data-sortable="true" width=10%') .
                tbaddcellhead('Title', '', 'data-field="title" data-sortable="true" width=10%') .
//                tbaddcellhead('Description', '', 'data-field="description" data-sortable="true" width=10%') .
                tbaddcellhead('Publish', '', 'data-field="date" data-sortable="true" width=10%') .
                tbaddcellhead('Image', '', 'data-field="image" data-sortable="true" width=10%') .
                tbaddcellhead('Show', '', 'data-field="istampil" data-sortable="true" width=10%') .
//                tbaddcellhead('keyword', '', 'data-field="keyword" data-sortable="true" width=10%') .
//                tbaddcellhead('idmetatag', '', 'data-field="idmetatag" data-sortable="true" width=10%') .
//                tbaddcellhead('idkategoripage', '', 'data-field="idkategoripage" data-sortable="true" width=10%') .
                tbaddcellhead('Language', '', 'data-field="idbahasa" data-sortable="true" width=10%') .
//                tbaddcellhead('idimage', '', 'data-field="idimage" data-sortable="true" width=10%') .
                tbaddcellhead('Last Update', '', 'data-field="update" data-sortable="true" width=10%') .
                tbaddcellhead('Author', '', 'data-field="iduser" data-sortable="true" width=10%') .
                tbaddcellhead('Action', 'padding:5px;', 'width:10%;text-align:center;'), '', TRUE);
        $this->load->model('modelpage');
        $this->load->model('basemodel');
        $this->load->model('modelusersistem');
        $this->load->model('modelbahasa');
        $xQuery = $this->modelpage->getListpage($xAwal, $xLimit, $xSearch);
        $xbufResult = '<thead>' . $xbufResult1 . '</thead>';
        $xbufResult .= '<tbody>';
        foreach ($xQuery->result() as $row) {
            $rowuser = $this->modelusersistem->getDetailusersistem($row->iduser);
            $rowbahasa = $this->modelbahasa->getDetailbahasa($row->idbahasa);
            $xButtonEdit = '<img src="' . base_url() . 'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditpage(\'' . $row->idx . '\');" style="border:none;width:20px"/>';
            $xButtonHapus = '<img src="' . base_url() . 'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapuspage(\'' . $row->idx . '\');" style="border:none;">';
            $xbufResult .= tbaddrow(tbaddcell($row->idx) .
                    tbaddcell($row->title) .
//                    tbaddcell($row->description) .
                    tbaddcell($row->date) .
                    tbaddcell('<img src="' . base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($row->image, 'thumb') . '" class="img-responsive" onClick="preview(\''.$row->image.'\')"/>') .
                    tbaddcell($row->istampil) .
//                    tbaddcell($row->keyword) .
//                    tbaddcell($row->idmetatag) .
//                    tbaddcell($row->idkategoripage) .
                    tbaddcell($rowbahasa->bahasa) .
//                    tbaddcell($row->idimage) .
                    tbaddcell($row->update) .
                    tbaddcell($rowuser->Nama) .
                    tbaddcell($xButtonEdit . '&nbsp/&nbsp' . $xButtonHapus));
        }
        $xInput = form_input(getArrayObj('edSearch', '', ' '));
        $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchpage(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
        $xButtonPrev = '<img src="' . base_url() . 'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchpage(' . ($xAwal - $xLimit) . ');"/>';
        $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>' . $xAwal . ' to ' . $xLimit . '</button>';
        $xButtonNext = '<img src="' . base_url() . 'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchpage(' . ($xAwal + $xLimit) . ');" />';
        $xbuffoottable = '<div class="foottable"><div class="col-md-6">' . setForm('', '', $xInput . $xButtonSearch, '', '') . '</div>' .
                '<div class="col-md-6">' . $xButtonPrev . $xButtonhalaman . $xButtonNext . '</div></div>';

        $xbufResult = tablegrid($xbufResult . '</tbody>', '', 'id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';

        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>' . '<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"><img class="center-block img-responsive" src="" id="imagepreview" alt="preview" /></div></div>';
    }

    function getlistpageAndroid() {
        $this->load->helper('json');
        $xSearch = $_POST['search'];
        $xAwal = $_POST['start'];
        $xLimit = $_POST['limit'];
        $this->load->helper('form');
        $this->load->helper('common');
        $this->json_data['idx'] = "";
        $this->json_data['title'] = "";
        $this->json_data['description'] = "";
        $this->json_data['date'] = "";
        $this->json_data['image'] = "";
        $this->json_data['istampil'] = "";
        $this->json_data['keyword'] = "";
        $this->json_data['idmetatag'] = "";
        $this->json_data['idkategoripage'] = "";
        $this->json_data['idbahasa'] = "";
        $this->json_data['idimage'] = "";
        $this->json_data['update'] = "";
        $this->json_data['iduser'] = "";

        $response = array();
        $this->load->model('modelpage');
        $xQuery = $this->modelpage->getListpage($xAwal, $xLimit, $xSearch);
        foreach ($xQuery->result() as $row) {
            $this->json_data['idx'] = $row->idx;
            $this->json_data['title'] = $row->title;
            $this->json_data['description'] = $row->description;
            $this->json_data['date'] = $row->date;
            $this->json_data['image'] = $row->image;
            $this->json_data['istampil'] = $row->istampil;
            $this->json_data['keyword'] = $row->keyword;
            $this->json_data['idmetatag'] = $row->idmetatag;
            $this->json_data['idkategoripage'] = $row->idkategoripage;
            $this->json_data['idbahasa'] = $row->idbahasa;
            $this->json_data['idimage'] = $row->idimage;
            $this->json_data['update'] = $row->update;
            $this->json_data['iduser'] = $row->iduser;

            array_push($response, $this->json_data);
        }
        if (empty($response)) {
            array_push($response, $this->json_data);
        }
        echo json_encode($response);
    }

    function simpanpageAndroid() {
        $xidx = $_POST['edidx'];
        $xtitle = $_POST['edtitle'];
        $xdescription = $_POST['eddescription'];
        $xdate = $_POST['eddate'];
        $ximage = $_POST['edimage'];
        $xistampil = $_POST['edistampil'];
        $xkeyword = $_POST['edkeyword'];
        $xidmetatag = $_POST['edidmetatag'];
        $xidkategoripage = $_POST['edidkategoripage'];
        $xidbahasa = $_POST['edidbahasa'];
        $xidimage = $_POST['edidimage'];
        $xupdate = $_POST['edupdate'];
        $xiduser = $_POST['ediduser'];

        $this->load->helper('json');
        $this->load->model('modelpage');
        $response = array();
        if ($xidx != '0') {
            $this->modelpage->setUpdatepage($xidx, $xtitle, $xdescription, $xdate, $ximage, $xistampil, $xkeyword, $xidmetatag, $xidkategoripage, $xidbahasa, $xidimage, $xupdate, $xiduser);
        } else {
            $this->modelpage->setInsertpage($xidx, $xtitle, $xdescription, $xdate, $ximage, $xistampil, $xkeyword, $xidmetatag, $xidkategoripage, $xidbahasa, $xidimage, $xupdate, $xiduser);
        }
        $row = $this->modelpage->getLastIndexpage();
        $this->json_data['idx'] = $row->idx;
        $this->json_data['title'] = $row->title;
        $this->json_data['description'] = $row->description;
        $this->json_data['date'] = $row->date;
        $this->json_data['image'] = $row->image;
        $this->json_data['istampil'] = $row->istampil;
        $this->json_data['keyword'] = $row->keyword;
        $this->json_data['idmetatag'] = $row->idmetatag;
        $this->json_data['idkategoripage'] = $row->idkategoripage;
        $this->json_data['idbahasa'] = $row->idbahasa;
        $this->json_data['idimage'] = $row->idimage;
        $this->json_data['update'] = $row->update;
        $this->json_data['iduser'] = $row->iduser;

        $response = array();
        array_push($response, $this->json_data);

        echo json_encode($response);
    }

    function editrecpage() {
        $xIdEdit = $_POST['edidx'];
        $this->load->helper('common');
        $this->load->model('modelpage');
        $row = $this->modelpage->getDetailpage($xIdEdit);
        $this->load->helper('json');
        $this->json_data['idx'] = $row->idx;
        $this->json_data['title'] = $row->title;
        $this->json_data['description'] = $row->description;
        $this->json_data['date'] = datetomysql($row->date);
        $this->json_data['image'] = $row->image;
        $this->json_data['istampil'] = $row->istampil;
        $this->json_data['keyword'] = $row->keyword;
        $this->json_data['idmetatag'] = $row->idmetatag;
        $this->json_data['idkategoripage'] = $row->idkategoripage;
        $this->json_data['idbahasa'] = $row->idbahasa;
        $this->json_data['idimage'] = $row->idimage;
        $this->json_data['update'] = $row->update;
        $this->json_data['iduser'] = $row->iduser;

        echo json_encode($this->json_data);
    }

    function deletetablepage() {
        $edidx = $_POST['edidx'];
        $this->load->model('modelpage');
        
        $this->modelpage->setDeletepage($edidx);
        $this->load->helper('json');
        echo json_encode(null);
    }

    function searchpage() {
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
        $this->json_data['tabledatapage'] = $this->getlistpage($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal . ' to ' . ($xlimit * $xHal);
        echo json_encode($this->json_data);
    }

    function simpanpage() {
        $this->load->helper('json');
        $this->load->helper('common');
        $this->load->model('basemodel');
        if (!empty($_POST['edidx'])) {
            $xidx = $_POST['edidx'];
        } else {
            $xidx = '0';
        }
        $xtitle = $_POST['edtitle'];
        $xdescription = $_POST['eddescription'];
        $xdate = $_POST['eddate'];
        $ximage = $_POST['edimage'];
        $xistampil = $_POST['edistampil'];
        $xkeyword = $_POST['edkeyword'];
        $xidmetatag = '';
        $xidkategoripage = '';
        $xidbahasa = $_POST['edidbahasa'];
        $xidimage = '';
        $xupdate = $_POST['edupdate'];
        $xiduser = $_POST['ediduser'];
           if (!empty($ximage)) {
                $this->basemodel->imageresize(150, 150, $ximage);
                $this->basemodel->imageresize(350, 350, $ximage);
            }
            
            $ximage = str_replace('.', '', substr($ximage, 0, -5)) . substr($ximage, -5);
            
        $this->load->model('modelpage');
        $xiduser = $this->session->userdata('idpegawai');
        if (!empty($xiduser)) {
            if ($xidx != '0') {
                $xStr = $this->modelpage->setUpdatepage($xidx, $xtitle, $xdescription, datetomysql($xdate), $ximage, $xistampil, $xkeyword, $xidmetatag, $xidkategoripage, $xidbahasa, $xidimage, $xupdate, $xiduser);
                
            } else {
                $xStr = $this->modelpage->setInsertpage($xidx, $xtitle, $xdescription, datetomysql($xdate), $ximage, $xistampil, $xkeyword, $xidmetatag, $xidkategoripage, $xidbahasa, $xidimage, $xupdate, $xiduser);
            }
        }
        echo json_encode(null);
    }

}
