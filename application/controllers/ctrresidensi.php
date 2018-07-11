<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
    /* Class  Control : residensi   *  By Diar */;

      class ctrresidensi extends CI_Controller { 
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
        $this->createformresidensi('0',$xAwal);
 } 
    
function createformresidensi($xidx, $xAwal = 0, $xSearch = '') {
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->model('modelgetmenu');
    $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
    link_tag('resource/css/admin/upload/css/upload.css'). "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxresidensi.js"></script>';
    echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormresidensi($xidx), '', '', $xAddJs,'','residensi' ); 

}
 
function setDetailFormresidensi($xidx){
        $this->load->helper('form'); 
          $xBufResult = '';
           $xBufResult = '<div id="stylized" class="myform">'.form_open_multipart('ctrresidensi/inserttable',array('id'=>'form','name'=>'form'));
      $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />'; 
        
$xBufResult .= setForm('title','title',form_input(getArrayObj('edtitle','','200'),'',' placeholder="title" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('description','description',form_input(getArrayObj('eddescription','','200'),'',' placeholder="description" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('datestart','datestart',form_input(getArrayObj('eddatestart','','200'),'',' placeholder="datestart" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('dateend','dateend',form_input(getArrayObj('eddateend','','200'),'',' placeholder="dateend" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('image','image',form_input(getArrayObj('edimage','','200'),'',' placeholder="image" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('istampil','istampil',form_input(getArrayObj('edistampil','','200'),'',' placeholder="istampil" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('keyword','keyword',form_input(getArrayObj('edkeyword','','200'),'',' placeholder="keyword" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idartist','idartist',form_input(getArrayObj('edidartist','','200'),'',' placeholder="idartist" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idmetatag','idmetatag',form_input(getArrayObj('edidmetatag','','200'),'',' placeholder="idmetatag" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idbahasa','idbahasa',form_input(getArrayObj('edidbahasa','','200'),'',' placeholder="idbahasa" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idimage','idimage',form_input(getArrayObj('edidimage','','200'),'',' placeholder="idimage" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('update','update',form_input(getArrayObj('edupdate','','200'),'',' placeholder="update" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('iduser','iduser',form_input(getArrayObj('ediduser','','200'),'',' placeholder="iduser" ')).'<div class="spacer"></div>';

$xBufResult .= '<div class="garis"></div>'.form_button('btSimpan','simpan','onclick="dosimpanresidensi();"').form_button('btNew','new','onclick="doClearresidensi();"').'<div class="spacer"></div><div id="tabledataresidensi">'.$this->getlistresidensi(0, ''). '</div><div class="spacer"></div>'; 
       return $xBufResult;

  }
  
function getlistresidensi($xAwal,$xSearch){ 
         $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
         $xbufResult1 =tbaddrow(         tbaddcellhead('idx','','data-field="idx" data-sortable="true" width=10%').
tbaddcellhead('title','','data-field="title" data-sortable="true" width=10%').
tbaddcellhead('description','','data-field="description" data-sortable="true" width=10%').
tbaddcellhead('datestart','','data-field="datestart" data-sortable="true" width=10%').
tbaddcellhead('dateend','','data-field="dateend" data-sortable="true" width=10%').
tbaddcellhead('image','','data-field="image" data-sortable="true" width=10%').
tbaddcellhead('istampil','','data-field="istampil" data-sortable="true" width=10%').
tbaddcellhead('keyword','','data-field="keyword" data-sortable="true" width=10%').
tbaddcellhead('idartist','','data-field="idartist" data-sortable="true" width=10%').
tbaddcellhead('idmetatag','','data-field="idmetatag" data-sortable="true" width=10%').
tbaddcellhead('idbahasa','','data-field="idbahasa" data-sortable="true" width=10%').
tbaddcellhead('idimage','','data-field="idimage" data-sortable="true" width=10%').
tbaddcellhead('update','','data-field="update" data-sortable="true" width=10%').
tbaddcellhead('iduser','','data-field="iduser" data-sortable="true" width=10%').

            tbaddcellhead('Edit/Hapus','padding:5px;','width:10%;text-align:center;'),'',TRUE);
         $this->load->model('modelresidensi');
         $xQuery = $this->modelresidensi->getListresidensi($xAwal,$xLimit,$xSearch);
          $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
              foreach ($xQuery->result() as $row)
            { 
                $xButtonEdit = '<img src="'.base_url().'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditresidensi(\''.$row->idx.'\');" style="border:none;width:20px"/>';
                $xButtonHapus = '<img src="'.base_url().'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusresidensi(\''.$row->idx.'\');" style="border:none;">';
                $xbufResult .= tbaddrow(         tbaddcell($row->idx).
tbaddcell($row->title).
tbaddcell($row->description).
tbaddcell($row->datestart).
tbaddcell($row->dateend).
tbaddcell($row->image).
tbaddcell($row->istampil).
tbaddcell($row->keyword).
tbaddcell($row->idartist).
tbaddcell($row->idmetatag).
tbaddcell($row->idbahasa).
tbaddcell($row->idimage).
tbaddcell($row->update).
tbaddcell($row->iduser).

            tbaddcell($xButtonEdit.'&nbsp/&nbsp'.$xButtonHapus));
            }
          $xInput      = form_input(getArrayObj('edSearch','',' ')); 
          $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchresidensi(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
          $xButtonPrev = '<img src="'.base_url().'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchresidensi('.($xAwal-$xLimit).');"/>';
          $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>'.$xAwal.' to '.$xLimit.'</button>';
        $xButtonNext = '<img src="'.base_url().'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchresidensi('.($xAwal+$xLimit).');" />';
       $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . $xButtonhalaman . $xButtonNext.'</div></div>';
        
      $xbufResult = tablegrid($xbufResult . '</tbody>','','id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>'.'<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
  }

  
function getlistresidensiAndroid(){ 
    $this->load->helper('json');
     $xSearch  = $_POST['search'];
      $xAwal  = $_POST['start'];
      $xLimit = $_POST['limit'];
    $this->load->helper('form');
    $this->load->helper('common');
       $this->json_data['idx'] = "";
$this->json_data['title'] = "";
$this->json_data['description'] = "";
$this->json_data['datestart'] = "";
$this->json_data['dateend'] = "";
$this->json_data['image'] = "";
$this->json_data['istampil'] = "";
$this->json_data['keyword'] = "";
$this->json_data['idartist'] = "";
$this->json_data['idmetatag'] = "";
$this->json_data['idbahasa'] = "";
$this->json_data['idimage'] = "";
$this->json_data['update'] = "";
$this->json_data['iduser'] = "";

            $response = array();
     $this->load->model('modelresidensi');
     $xQuery = $this->modelresidensi->getListresidensi($xAwal,$xLimit,$xSearch);
      foreach ($xQuery->result() as $row){
                $this->json_data['idx']=$row->idx;
$this->json_data['title']=$row->title;
$this->json_data['description']=$row->description;
$this->json_data['datestart']=$row->datestart;
$this->json_data['dateend']=$row->dateend;
$this->json_data['image']=$row->image;
$this->json_data['istampil']=$row->istampil;
$this->json_data['keyword']=$row->keyword;
$this->json_data['idartist']=$row->idartist;
$this->json_data['idmetatag']=$row->idmetatag;
$this->json_data['idbahasa']=$row->idbahasa;
$this->json_data['idimage']=$row->idimage;
$this->json_data['update']=$row->update;
$this->json_data['iduser']=$row->iduser;

            array_push($response, $this->json_data);
        }
      if(empty($response)){        array_push($response, $this->json_data);       }
      echo json_encode($response);

}

function  simpanresidensiAndroid(){ 
    $xidx = $_POST['edidx'];
$xtitle = $_POST['edtitle'];
$xdescription = $_POST['eddescription'];
$xdatestart = $_POST['eddatestart'];
$xdateend = $_POST['eddateend'];
$ximage = $_POST['edimage'];
$xistampil = $_POST['edistampil'];
$xkeyword = $_POST['edkeyword'];
$xidartist = $_POST['edidartist'];
$xidmetatag = $_POST['edidmetatag'];
$xidbahasa = $_POST['edidbahasa'];
$xidimage = $_POST['edidimage'];
$xupdate = $_POST['edupdate'];
$xiduser = $_POST['ediduser'];

            $this->load->helper('json');
     $this->load->model('modelresidensi');
     $response = array();if($xidx!='0'){$this->modelresidensi->setUpdateresidensi($xidx,$xtitle,$xdescription,$xdatestart,$xdateend,$ximage,$xistampil,$xkeyword,$xidartist,$xidmetatag,$xidbahasa,$xidimage,$xupdate,$xiduser);
      } else 
     { 
        $this->modelresidensi->setInsertresidensi($xidx,$xtitle,$xdescription,$xdatestart,$xdateend,$ximage,$xistampil,$xkeyword,$xidartist,$xidmetatag,$xidbahasa,$xidimage,$xupdate,$xiduser);
     }
    $row = $this->modelresidensi->getLastIndexresidensi();
    $this->json_data['idx'] = $row->idx;
$this->json_data['title'] = $row->title;
$this->json_data['description'] = $row->description;
$this->json_data['datestart'] = $row->datestart;
$this->json_data['dateend'] = $row->dateend;
$this->json_data['image'] = $row->image;
$this->json_data['istampil'] = $row->istampil;
$this->json_data['keyword'] = $row->keyword;
$this->json_data['idartist'] = $row->idartist;
$this->json_data['idmetatag'] = $row->idmetatag;
$this->json_data['idbahasa'] = $row->idbahasa;
$this->json_data['idimage'] = $row->idimage;
$this->json_data['update'] = $row->update;
$this->json_data['iduser'] = $row->iduser;

            $response = array();        
                array_push($response, $this->json_data);          

                echo json_encode($response); }

 function editrecresidensi(){ 
        $xIdEdit  = $_POST['edidx']; 
        $this->load->model('modelresidensi');  
         $row = $this->modelresidensi->getDetailresidensi($xIdEdit); 
        $this->load->helper('json'); 
      $this->json_data['idx'] = $row->idx;
$this->json_data['title'] = $row->title;
$this->json_data['description'] = $row->description;
$this->json_data['datestart'] = $row->datestart;
$this->json_data['dateend'] = $row->dateend;
$this->json_data['image'] = $row->image;
$this->json_data['istampil'] = $row->istampil;
$this->json_data['keyword'] = $row->keyword;
$this->json_data['idartist'] = $row->idartist;
$this->json_data['idmetatag'] = $row->idmetatag;
$this->json_data['idbahasa'] = $row->idbahasa;
$this->json_data['idimage'] = $row->idimage;
$this->json_data['update'] = $row->update;
$this->json_data['iduser'] = $row->iduser;

            echo json_encode($this->json_data);
   }
function deletetableresidensi(){ 
    $edidx = $_POST['edidx']; 
    $this->load->model('modelresidensi'); 
    $this->modelresidensi->setDeleteresidensi($edidx); 
    $this->load->helper('json');
    echo json_encode(null);
  }
function searchresidensi(){ 
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
        $this->json_data['tabledataresidensi'] = $this->getlistresidensi($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal.' to '.($xlimit*$xHal);
    echo json_encode($this->json_data); 
  } 

 function  simpanresidensi(){ 
        $this->load->helper('json'); 
          if(!empty($_POST['edidx'])) 
        { 
         $xidx =  $_POST['edidx']; 
          } else{ 
         $xidx = '0'; 
         } 
$xtitle = $_POST['edtitle'];
$xdescription = $_POST['eddescription'];
$xdatestart = $_POST['eddatestart'];
$xdateend = $_POST['eddateend'];
$ximage = $_POST['edimage'];
$xistampil = $_POST['edistampil'];
$xkeyword = $_POST['edkeyword'];
$xidartist = $_POST['edidartist'];
$xidmetatag = $_POST['edidmetatag'];
$xidbahasa = $_POST['edidbahasa'];
$xidimage = $_POST['edidimage'];
$xupdate = $_POST['edupdate'];
$xiduser = $_POST['ediduser'];
          
             $this->load->model('modelresidensi'); 
        $idpegawai = $this->session->userdata('idpegawai'); 
        if(!empty($idpegawai)){ 
        if($xidx!='0'){   $xStr =  $this->modelresidensi->setUpdateresidensi($xidx,$xtitle,$xdescription,$xdatestart,$xdateend,$ximage,$xistampil,$xkeyword,$xidartist,$xidmetatag,$xidbahasa,$xidimage,$xupdate,$xiduser); 
         } else 
         { 
           $xStr =  $this->modelresidensi->setInsertresidensi($xidx,$xtitle,$xdescription,$xdatestart,$xdateend,$ximage,$xistampil,$xkeyword,$xidartist,$xidmetatag,$xidbahasa,$xidimage,$xupdate,$xiduser); 
         }} 
               echo json_encode(null);
    } }