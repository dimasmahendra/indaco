<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
    /* Class  Control : publishing   *  By Diar */;

      class ctrpublishing extends CI_Controller { 
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
        $this->createformpublishing('0',$xAwal);
 } 
    
function createformpublishing($xidx, $xAwal = 0, $xSearch = '') {
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->model('modelgetmenu');
    $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
    link_tag('resource/css/admin/upload/css/upload.css'). "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxpublishing.js"></script>';
    echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormpublishing($xidx), '', '', $xAddJs,'','publishing' ); 

}
 
function setDetailFormpublishing($xidx){
        $this->load->helper('form'); 
          $xBufResult = '';
           $xBufResult = '<div id="stylized" class="myform">'.form_open_multipart('ctrpublishing/inserttable',array('id'=>'form','name'=>'form'));
      $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />'; 
        
$xBufResult .= setForm('title','title',form_input(getArrayObj('edtitle','','200'),'',' placeholder="title" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('description','description',form_input(getArrayObj('eddescription','','200'),'',' placeholder="description" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('keyword','keyword',form_input(getArrayObj('edkeyword','','200'),'',' placeholder="keyword" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idmetatag','idmetatag',form_input(getArrayObj('edidmetatag','','200'),'',' placeholder="idmetatag" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('image','image',form_input(getArrayObj('edimage','','200'),'',' placeholder="image" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('video','video',form_input(getArrayObj('edvideo','','200'),'',' placeholder="video" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('audio','audio',form_input(getArrayObj('edaudio','','200'),'',' placeholder="audio" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('pdf','pdf',form_input(getArrayObj('edpdf','','200'),'',' placeholder="pdf" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('update','update',form_input(getArrayObj('edupdate','','200'),'',' placeholder="update" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('iduser','iduser',form_input(getArrayObj('ediduser','','200'),'',' placeholder="iduser" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idimage','idimage',form_input(getArrayObj('edidimage','','200'),'',' placeholder="idimage" ')).'<div class="spacer"></div>';

$xBufResult .= '<div class="garis"></div>'.form_button('btSimpan','simpan','onclick="dosimpanpublishing();"').form_button('btNew','new','onclick="doClearpublishing();"').'<div class="spacer"></div><div id="tabledatapublishing">'.$this->getlistpublishing(0, ''). '</div><div class="spacer"></div>'; 
       return $xBufResult;

  }
  
function getlistpublishing($xAwal,$xSearch){ 
         $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
         $xbufResult1 =tbaddrow(         tbaddcellhead('idx','','data-field="idx" data-sortable="true" width=10%').
tbaddcellhead('title','','data-field="title" data-sortable="true" width=10%').
tbaddcellhead('description','','data-field="description" data-sortable="true" width=10%').
tbaddcellhead('keyword','','data-field="keyword" data-sortable="true" width=10%').
tbaddcellhead('idmetatag','','data-field="idmetatag" data-sortable="true" width=10%').
tbaddcellhead('image','','data-field="image" data-sortable="true" width=10%').
tbaddcellhead('video','','data-field="video" data-sortable="true" width=10%').
tbaddcellhead('audio','','data-field="audio" data-sortable="true" width=10%').
tbaddcellhead('pdf','','data-field="pdf" data-sortable="true" width=10%').
tbaddcellhead('update','','data-field="update" data-sortable="true" width=10%').
tbaddcellhead('iduser','','data-field="iduser" data-sortable="true" width=10%').
tbaddcellhead('idimage','','data-field="idimage" data-sortable="true" width=10%').

            tbaddcellhead('Edit/Hapus','padding:5px;','width:10%;text-align:center;'),'',TRUE);
         $this->load->model('modelpublishing');
         $xQuery = $this->modelpublishing->getListpublishing($xAwal,$xLimit,$xSearch);
          $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
              foreach ($xQuery->result() as $row)
            { 
                $xButtonEdit = '<img src="'.base_url().'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditpublishing(\''.$row->idx.'\');" style="border:none;width:20px"/>';
                $xButtonHapus = '<img src="'.base_url().'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapuspublishing(\''.$row->idx.'\');" style="border:none;">';
                $xbufResult .= tbaddrow(         tbaddcell($row->idx).
tbaddcell($row->title).
tbaddcell($row->description).
tbaddcell($row->keyword).
tbaddcell($row->idmetatag).
tbaddcell($row->image).
tbaddcell($row->video).
tbaddcell($row->audio).
tbaddcell($row->pdf).
tbaddcell($row->update).
tbaddcell($row->iduser).
tbaddcell($row->idimage).

            tbaddcell($xButtonEdit.'&nbsp/&nbsp'.$xButtonHapus));
            }
          $xInput      = form_input(getArrayObj('edSearch','',' ')); 
          $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchpublishing(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
          $xButtonPrev = '<img src="'.base_url().'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchpublishing('.($xAwal-$xLimit).');"/>';
          $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>'.$xAwal.' to '.$xLimit.'</button>';
        $xButtonNext = '<img src="'.base_url().'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchpublishing('.($xAwal+$xLimit).');" />';
       $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . $xButtonhalaman . $xButtonNext.'</div></div>';
        
      $xbufResult = tablegrid($xbufResult . '</tbody>','','id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>'.'<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
  }

  
function getlistpublishingAndroid(){ 
    $this->load->helper('json');
     $xSearch  = $_POST['search'];
      $xAwal  = $_POST['start'];
      $xLimit = $_POST['limit'];
    $this->load->helper('form');
    $this->load->helper('common');
       $this->json_data['idx'] = "";
$this->json_data['title'] = "";
$this->json_data['description'] = "";
$this->json_data['keyword'] = "";
$this->json_data['idmetatag'] = "";
$this->json_data['image'] = "";
$this->json_data['video'] = "";
$this->json_data['audio'] = "";
$this->json_data['pdf'] = "";
$this->json_data['update'] = "";
$this->json_data['iduser'] = "";
$this->json_data['idimage'] = "";

            $response = array();
     $this->load->model('modelpublishing');
     $xQuery = $this->modelpublishing->getListpublishing($xAwal,$xLimit,$xSearch);
      foreach ($xQuery->result() as $row){
                $this->json_data['idx']=$row->idx;
$this->json_data['title']=$row->title;
$this->json_data['description']=$row->description;
$this->json_data['keyword']=$row->keyword;
$this->json_data['idmetatag']=$row->idmetatag;
$this->json_data['image']=$row->image;
$this->json_data['video']=$row->video;
$this->json_data['audio']=$row->audio;
$this->json_data['pdf']=$row->pdf;
$this->json_data['update']=$row->update;
$this->json_data['iduser']=$row->iduser;
$this->json_data['idimage']=$row->idimage;

            array_push($response, $this->json_data);
        }
      if(empty($response)){        array_push($response, $this->json_data);       }
      echo json_encode($response);

}

function  simpanpublishingAndroid(){ 
    $xidx = $_POST['edidx'];
$xtitle = $_POST['edtitle'];
$xdescription = $_POST['eddescription'];
$xkeyword = $_POST['edkeyword'];
$xidmetatag = $_POST['edidmetatag'];
$ximage = $_POST['edimage'];
$xvideo = $_POST['edvideo'];
$xaudio = $_POST['edaudio'];
$xpdf = $_POST['edpdf'];
$xupdate = $_POST['edupdate'];
$xiduser = $_POST['ediduser'];
$xidimage = $_POST['edidimage'];

            $this->load->helper('json');
     $this->load->model('modelpublishing');
     $response = array();if($xidx!='0'){$this->modelpublishing->setUpdatepublishing($xidx,$xtitle,$xdescription,$xkeyword,$xidmetatag,$ximage,$xvideo,$xaudio,$xpdf,$xupdate,$xiduser,$xidimage);
      } else 
     { 
        $this->modelpublishing->setInsertpublishing($xidx,$xtitle,$xdescription,$xkeyword,$xidmetatag,$ximage,$xvideo,$xaudio,$xpdf,$xupdate,$xiduser,$xidimage);
     }
    $row = $this->modelpublishing->getLastIndexpublishing();
    $this->json_data['idx'] = $row->idx;
$this->json_data['title'] = $row->title;
$this->json_data['description'] = $row->description;
$this->json_data['keyword'] = $row->keyword;
$this->json_data['idmetatag'] = $row->idmetatag;
$this->json_data['image'] = $row->image;
$this->json_data['video'] = $row->video;
$this->json_data['audio'] = $row->audio;
$this->json_data['pdf'] = $row->pdf;
$this->json_data['update'] = $row->update;
$this->json_data['iduser'] = $row->iduser;
$this->json_data['idimage'] = $row->idimage;

            $response = array();        
                array_push($response, $this->json_data);          

                echo json_encode($response); }

 function editrecpublishing(){ 
        $xIdEdit  = $_POST['edidx']; 
        $this->load->model('modelpublishing');  
         $row = $this->modelpublishing->getDetailpublishing($xIdEdit); 
        $this->load->helper('json'); 
      $this->json_data['idx'] = $row->idx;
$this->json_data['title'] = $row->title;
$this->json_data['description'] = $row->description;
$this->json_data['keyword'] = $row->keyword;
$this->json_data['idmetatag'] = $row->idmetatag;
$this->json_data['image'] = $row->image;
$this->json_data['video'] = $row->video;
$this->json_data['audio'] = $row->audio;
$this->json_data['pdf'] = $row->pdf;
$this->json_data['update'] = $row->update;
$this->json_data['iduser'] = $row->iduser;
$this->json_data['idimage'] = $row->idimage;

            echo json_encode($this->json_data);
   }
function deletetablepublishing(){ 
    $edidx = $_POST['edidx']; 
    $this->load->model('modelpublishing'); 
    $this->modelpublishing->setDeletepublishing($edidx); 
    $this->load->helper('json');
    echo json_encode(null);
  }
function searchpublishing(){ 
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
        $this->json_data['tabledatapublishing'] = $this->getlistpublishing($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal.' to '.($xlimit*$xHal);
    echo json_encode($this->json_data); 
  } 

 function  simpanpublishing(){ 
        $this->load->helper('json'); 
          if(!empty($_POST['edidx'])) 
        { 
         $xidx =  $_POST['edidx']; 
          } else{ 
         $xidx = '0'; 
         } 
$xtitle = $_POST['edtitle'];
$xdescription = $_POST['eddescription'];
$xkeyword = $_POST['edkeyword'];
$xidmetatag = $_POST['edidmetatag'];
$ximage = $_POST['edimage'];
$xvideo = $_POST['edvideo'];
$xaudio = $_POST['edaudio'];
$xpdf = $_POST['edpdf'];
$xupdate = $_POST['edupdate'];
$xiduser = $_POST['ediduser'];
$xidimage = $_POST['edidimage'];
          
             $this->load->model('modelpublishing'); 
        $idpegawai = $this->session->userdata('idpegawai'); 
        if(!empty($idpegawai)){ 
        if($xidx!='0'){   $xStr =  $this->modelpublishing->setUpdatepublishing($xidx,$xtitle,$xdescription,$xkeyword,$xidmetatag,$ximage,$xvideo,$xaudio,$xpdf,$xupdate,$xiduser,$xidimage); 
         } else 
         { 
           $xStr =  $this->modelpublishing->setInsertpublishing($xidx,$xtitle,$xdescription,$xkeyword,$xidmetatag,$ximage,$xvideo,$xaudio,$xpdf,$xupdate,$xiduser,$xidimage); 
         }} 
               echo json_encode(null);
    } }