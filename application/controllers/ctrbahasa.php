<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
    /* Class  Control : bahasa   *  By Diar */;

      class ctrbahasa extends CI_Controller { 
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
        $this->createformbahasa('0',$xAwal);
 } 
    
function createformbahasa($xidx, $xAwal = 0, $xSearch = '') {
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->model('modelgetmenu');
    $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
    link_tag('resource/css/admin/upload/css/upload.css'). "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxbahasa.js"></script>';
    echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormbahasa($xidx), '', '', $xAddJs,'','bahasa' ); 

}
 
function setDetailFormbahasa($xidx){
    $this->load->helper('form'); 
    $xBufResult = '';
    $xBufResult = '<div id="stylized" class="myform">'.form_open_multipart('ctrbahasa/inserttable',array('id'=>'form','name'=>'form'));
    $this->load->helper('common');
    $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />'; 
        
    $xBufResult .= setForm('bahasa','bahasa',form_input(getArrayObj('edbahasa','','200'),'',' placeholder="bahasa" ')).'<div class="spacer"></div>';

    $xBufResult .= setForm('slug','slug',form_input(getArrayObj('edslug','','200'),'',' placeholder="slug" ')).'<div class="spacer"></div>';

    $xBufResult .= '<div class="garis"></div>'.form_button('btSimpan','simpan','onclick="dosimpanbahasa();"').form_button('btNew','new','onclick="doClearbahasa();"').'<div class="spacer"></div><div id="tabledatabahasa">'.$this->getlistbahasa(0, ''). '</div><div class="spacer"></div>'; 
       return $xBufResult;

  }
  
function getlistbahasa($xAwal,$xSearch){ 
         $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
         $xbufResult1 =tbaddrow(         tbaddcellhead('idx','','data-field="idx" data-sortable="true" width=10%').
tbaddcellhead('bahasa','','data-field="bahasa" data-sortable="true" width=10%').
tbaddcellhead('slug','','data-field="slug" data-sortable="true" width=10%').

            tbaddcellhead('Edit/Hapus','padding:5px;','width:10%;text-align:center;'),'',TRUE);
         $this->load->model('modelbahasa');
         $xQuery = $this->modelbahasa->getListbahasa($xAwal,$xLimit,$xSearch);
          $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
              foreach ($xQuery->result() as $row)
            { 
                $xButtonEdit = '<img src="'.base_url().'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditbahasa(\''.$row->idx.'\');" style="border:none;width:20px"/>';
                $xButtonHapus = '<img src="'.base_url().'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusbahasa(\''.$row->idx.'\');" style="border:none;">';
                $xbufResult .= tbaddrow(         tbaddcell($row->idx).
tbaddcell($row->bahasa).
tbaddcell($row->slug).

            tbaddcell($xButtonEdit.'&nbsp/&nbsp'.$xButtonHapus));
            }
          $xInput      = form_input(getArrayObj('edSearch','',' ')); 
          $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchbahasa(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
          $xButtonPrev = '<img src="'.base_url().'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchbahasa('.($xAwal-$xLimit).');"/>';
          $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>'.$xAwal.' to '.$xLimit.'</button>';
        $xButtonNext = '<img src="'.base_url().'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchbahasa('.($xAwal+$xLimit).');" />';
       $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . $xButtonhalaman . $xButtonNext.'</div></div>';
        
      $xbufResult = tablegrid($xbufResult . '</tbody>','','id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>'.'<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
  }

  
function getlistbahasaAndroid(){ 
    $this->load->helper('json');
     $xSearch  = $_POST['search'];
      $xAwal  = $_POST['start'];
      $xLimit = $_POST['limit'];
    $this->load->helper('form');
    $this->load->helper('common');
       $this->json_data['idx'] = "";
$this->json_data['bahasa'] = "";
$this->json_data['slug'] = "";

            $response = array();
     $this->load->model('modelbahasa');
     $xQuery = $this->modelbahasa->getListbahasa($xAwal,$xLimit,$xSearch);
      foreach ($xQuery->result() as $row){
                $this->json_data['idx']=$row->idx;
$this->json_data['bahasa']=$row->bahasa;
$this->json_data['slug']=$row->slug;

            array_push($response, $this->json_data);
        }
      if(empty($response)){        array_push($response, $this->json_data);       }
      echo json_encode($response);

}

function  simpanbahasaAndroid(){ 
    $xidx = $_POST['edidx'];
$xbahasa = $_POST['edbahasa'];
$xslug = $_POST['edslug'];

            $this->load->helper('json');
     $this->load->model('modelbahasa');
     $response = array();if($xidx!='0'){$this->modelbahasa->setUpdatebahasa($xidx,$xbahasa,$xslug);
      } else 
     { 
        $this->modelbahasa->setInsertbahasa($xidx,$xbahasa,$xslug);
     }
    $row = $this->modelbahasa->getLastIndexbahasa();
    $this->json_data['idx'] = $row->idx;
$this->json_data['bahasa'] = $row->bahasa;
$this->json_data['slug'] = $row->slug;

            $response = array();        
                array_push($response, $this->json_data);          

                echo json_encode($response); }

 function editrecbahasa(){ 
        $xIdEdit  = $_POST['edidx']; 
        $this->load->model('modelbahasa');  
         $row = $this->modelbahasa->getDetailbahasa($xIdEdit); 
        $this->load->helper('json'); 
      $this->json_data['idx'] = $row->idx;
$this->json_data['bahasa'] = $row->bahasa;
$this->json_data['slug'] = $row->slug;

            echo json_encode($this->json_data);
   }
function deletetablebahasa(){ 
    $edidx = $_POST['edidx']; 
    $this->load->model('modelbahasa'); 
    $this->modelbahasa->setDeletebahasa($edidx); 
    $this->load->helper('json');
    echo json_encode(null);
  }
function searchbahasa(){ 
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
        $this->json_data['tabledatabahasa'] = $this->getlistbahasa($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal.' to '.($xlimit*$xHal);
    echo json_encode($this->json_data); 
  } 

 function  simpanbahasa(){ 
        $this->load->helper('json'); 
          if(!empty($_POST['edidx'])) 
        { 
         $xidx =  $_POST['edidx']; 
          } else{ 
         $xidx = '0'; 
         } 
$xbahasa = $_POST['edbahasa'];
$xslug = $_POST['edslug'];
          
             $this->load->model('modelbahasa'); 
        $idpegawai = $this->session->userdata('idpegawai'); 
        if(!empty($idpegawai)){ 
        if($xidx!='0'){   $xStr =  $this->modelbahasa->setUpdatebahasa($xidx,$xbahasa,$xslug); 
         } else 
         { 
           $xStr =  $this->modelbahasa->setInsertbahasa($xidx,$xbahasa,$xslug); 
         }} 
               echo json_encode(null);
    } }