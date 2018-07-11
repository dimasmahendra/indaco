<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
    /* Class  Control : imagemanager   *  By Diar */;

      class ctrimagemanager extends CI_Controller { 
     function __construct()
     {
        parent::__construct();
     }

    
function index($xAwal=0,$xSearch=''){
       $idpegawai = $this->session->userdata('idpegawai');
        if (empty($idpegawai)) {
           redirect(site_url(), '');
       }
       if($xAwal <= -1){
           $xAwal = 0;
        }    
        $this->session->set_userdata('awal',$xAwal);
        $this->session->set_userdata('limit', 100); 
        $this->createformimagemanager('0',$xAwal);
 } 
    
function createformimagemanager($xidx, $xAwal = 0, $xSearch = '') {
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->model('modelgetmenu');
    $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
    link_tag('resource/css/admin/upload/css/upload.css'). "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaximagemanager.js"></script>';
    echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormimagemanager($xidx), '', '', $xAddJs,'','imagemanager' ); 

}
 
function setDetailFormimagemanager($xidx){
        $this->load->helper('form'); 
          $xBufResult = '';
           $xBufResult = '<div id="stylized" class="myform">'.form_open_multipart('ctrimagemanager/inserttable',array('id'=>'form','name'=>'form'));
      $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />'; 
        
$xBufResult .= setForm('image','image',form_input(getArrayObj('edimage','','200'),'',' placeholder="image" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('title','title',form_input(getArrayObj('edtitle','','200'),'',' placeholder="title" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('description','description',form_input(getArrayObj('eddescription','','200'),'',' placeholder="description" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('alt','alt',form_input(getArrayObj('edalt','','200'),'',' placeholder="alt" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('update','update',form_input(getArrayObj('edupdate','','200'),'',' placeholder="update" ')).'<div class="spacer"></div>';

$xBufResult .= '<div class="garis"></div>'.form_button('btSimpan','simpan','onclick="dosimpanimagemanager();"').form_button('btNew','new','onclick="doClearimagemanager();"').'<div class="spacer"></div><div id="tabledataimagemanager">'.$this->getlistimagemanager(0, ''). '</div><div class="spacer"></div>'; 
       return $xBufResult;

  }
  
function getlistimagemanager($xAwal,$xSearch){ 
         $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
         $xbufResult1 =tbaddrow(         tbaddcellhead('idx','','data-field="idx" data-sortable="true" width=10%').
tbaddcellhead('image','','data-field="image" data-sortable="true" width=10%').
tbaddcellhead('title','','data-field="title" data-sortable="true" width=10%').
tbaddcellhead('description','','data-field="description" data-sortable="true" width=10%').
tbaddcellhead('alt','','data-field="alt" data-sortable="true" width=10%').
tbaddcellhead('update','','data-field="update" data-sortable="true" width=10%').

            tbaddcellhead('Edit/Hapus','padding:5px;','width:10%;text-align:center;'),'',TRUE);
         $this->load->model('modelimagemanager');
         $xQuery = $this->modelimagemanager->getListimagemanager($xAwal,$xLimit,$xSearch);
          $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
              foreach ($xQuery->result() as $row)
            { 
                $xButtonEdit = '<img src="'.base_url().'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditimagemanager(\''.$row->idx.'\');" style="border:none;width:20px"/>';
                $xButtonHapus = '<img src="'.base_url().'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusimagemanager(\''.$row->idx.'\');" style="border:none;">';
                $xbufResult .= tbaddrow(         tbaddcell($row->idx).
tbaddcell($row->image).
tbaddcell($row->title).
tbaddcell($row->description).
tbaddcell($row->alt).
tbaddcell($row->update).

            tbaddcell($xButtonEdit.'&nbsp/&nbsp'.$xButtonHapus));
            }
          $xInput      = form_input(getArrayObj('edSearch','',' ')); 
          $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchimagemanager(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
          $xButtonPrev = '<img src="'.base_url().'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchimagemanager('.($xAwal-$xLimit).');"/>';
          $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>'.$xAwal.' to '.$xLimit.'</button>';
        $xButtonNext = '<img src="'.base_url().'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchimagemanager('.($xAwal+$xLimit).');" />';
       $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . $xButtonhalaman . $xButtonNext.'</div></div>';
        
      $xbufResult = tablegrid($xbufResult . '</tbody>','','id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>'.'<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
  }

  
function getlistimagemanagerAndroid(){ 
    $this->load->helper('json');
     $xSearch  = $_POST['search'];
      $xAwal  = $_POST['start'];
      $xLimit = $_POST['limit'];
    $this->load->helper('form');
    $this->load->helper('common');
       $this->json_data['idx'] = "";
$this->json_data['image'] = "";
$this->json_data['title'] = "";
$this->json_data['description'] = "";
$this->json_data['alt'] = "";
$this->json_data['update'] = "";

            $response = array();
     $this->load->model('modelimagemanager');
     $xQuery = $this->modelimagemanager->getListimagemanager($xAwal,$xLimit,$xSearch);
      foreach ($xQuery->result() as $row){
                $this->json_data['idx']=$row->idx;
$this->json_data['image']=$row->image;
$this->json_data['title']=$row->title;
$this->json_data['description']=$row->description;
$this->json_data['alt']=$row->alt;
$this->json_data['update']=$row->update;

            array_push($response, $this->json_data);
        }
      if(empty($response)){        array_push($response, $this->json_data);       }
      echo json_encode($response);

}

function  simpanimagemanagerAndroid(){ 
    $xidx = $_POST['edidx'];
$ximage = $_POST['edimage'];
$xtitle = $_POST['edtitle'];
$xdescription = $_POST['eddescription'];
$xalt = $_POST['edalt'];
$xupdate = $_POST['edupdate'];

            $this->load->helper('json');
     $this->load->model('modelimagemanager');
     $response = array();if($xidx!='0'){$this->modelimagemanager->setUpdateimagemanager($xidx,$ximage,$xtitle,$xdescription,$xalt,$xupdate);
      } else 
     { 
        $this->modelimagemanager->setInsertimagemanager($xidx,$ximage,$xtitle,$xdescription,$xalt,$xupdate);
     }
    $row = $this->modelimagemanager->getLastIndeximagemanager();
    $this->json_data['idx'] = $row->idx;
$this->json_data['image'] = $row->image;
$this->json_data['title'] = $row->title;
$this->json_data['description'] = $row->description;
$this->json_data['alt'] = $row->alt;
$this->json_data['update'] = $row->update;

            $response = array();        
                array_push($response, $this->json_data);          

                echo json_encode($response); }

 function editrecimagemanager(){ 
        $xIdEdit  = $_POST['edidx']; 
        $this->load->model('modelimagemanager');  
         $row = $this->modelimagemanager->getDetailimagemanager($xIdEdit); 
        $this->load->helper('json'); 
      $this->json_data['idx'] = $row->idx;
$this->json_data['image'] = $row->image;
$this->json_data['title'] = $row->title;
$this->json_data['description'] = $row->description;
$this->json_data['alt'] = $row->alt;
$this->json_data['update'] = $row->update;

            echo json_encode($this->json_data);
   }
function deletetableimagemanager(){ 
    $edidx = $_POST['edidx']; 
    $this->load->model('modelimagemanager'); 
    $this->modelimagemanager->setDeleteimagemanager($edidx); 
    $this->load->helper('json');
    echo json_encode(null);
  }
function searchimagemanager(){ 
    $xAwal = $_POST['xAwal']; 
    $xSearch = $_POST['xSearch']; 
    $this->load->helper('json'); 
    $xhalaman = @ceil($xAwal/($xAwal-$this->session->userdata('awal', $xAwal)));
    $xlimit = $this->session->userdata('limit');
        $xHal=1;
        if($xAwal <= 0){
              $xHal = 1;
        }else{
            $xHal = ($xhalaman+1);
        }
        if($xhalaman < 0){
              $xHal = (($xhalaman-1)*-1);
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
        $this->json_data['tabledataimagemanager'] = $this->getlistimagemanager($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal.' to '.($xlimit*$xHal);
    echo json_encode($this->json_data); 
  } 

 function  simpanimagemanager(){ 
        $this->load->helper('json'); 
          if(!empty($_POST['edidx'])) 
        { 
         $xidx =  $_POST['edidx']; 
          } else{ 
         $xidx = '0'; 
         } 
$ximage = $_POST['edimage'];
$xtitle = $_POST['edtitle'];
$xdescription = $_POST['eddescription'];
$xalt = $_POST['edalt'];
$xupdate = $_POST['edupdate'];
          
             $this->load->model('modelimagemanager'); 
        $idpegawai = $this->session->userdata('idpegawai'); 
        if(!empty($idpegawai)){ 
        if($xidx!='0'){   $xStr =  $this->modelimagemanager->setUpdateimagemanager($xidx,$ximage,$xtitle,$xdescription,$xalt,$xupdate); 
         } else 
         { 
           $xStr =  $this->modelimagemanager->setInsertimagemanager($xidx,$ximage,$xtitle,$xdescription,$xalt,$xupdate); 
         }} 
               echo json_encode(null);
    } }