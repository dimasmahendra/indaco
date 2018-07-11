<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
    /* Class  Control : content_to_kategori   *  By Diar */;

      class ctrcontent_to_kategori extends CI_Controller { 
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
        $this->createformcontent_to_kategori('0',$xAwal);
 } 
    
function createformcontent_to_kategori($xidx, $xAwal = 0, $xSearch = '') {
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->model('modelgetmenu');
    $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
    link_tag('resource/css/admin/upload/css/upload.css'). "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxcontent_to_kategori.js"></script>';
    echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormcontent_to_kategori($xidx), '', '', $xAddJs,'','content_to_kategori' ); 

}
 
function setDetailFormcontent_to_kategori($xidx){
        $this->load->helper('form'); 
          $xBufResult = '';
           $xBufResult = '<div id="stylized" class="myform">'.form_open_multipart('ctrcontent_to_kategori/inserttable',array('id'=>'form','name'=>'form'));
      $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />'; 
        
$xBufResult .= setForm('idcontent','idcontent',form_input(getArrayObj('edidcontent','','200'),'',' placeholder="idcontent" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idkategori','idkategori',form_input(getArrayObj('edidkategori','','200'),'',' placeholder="idkategori" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('urut','urut',form_input(getArrayObj('edurut','','200'),'',' placeholder="urut" ')).'<div class="spacer"></div>';

$xBufResult .= '<div class="garis"></div>'.form_button('btSimpan','simpan','onclick="dosimpancontent_to_kategori();"').form_button('btNew','new','onclick="doClearcontent_to_kategori();"').'<div class="spacer"></div><div id="tabledatacontent_to_kategori">'.$this->getlistcontent_to_kategori(0, ''). '</div><div class="spacer"></div>'; 
       return $xBufResult;

  }
  
function getlistcontent_to_kategori($xAwal,$xSearch){ 
         $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
         $xbufResult1 =tbaddrow(         tbaddcellhead('idx','','data-field="idx" data-sortable="true" width=10%').
tbaddcellhead('idcontent','','data-field="idcontent" data-sortable="true" width=10%').
tbaddcellhead('idkategori','','data-field="idkategori" data-sortable="true" width=10%').
tbaddcellhead('urut','','data-field="urut" data-sortable="true" width=10%').

            tbaddcellhead('Edit/Hapus','padding:5px;','width:10%;text-align:center;'),'',TRUE);
         $this->load->model('modelcontent_to_kategori');
         $xQuery = $this->modelcontent_to_kategori->getListcontent_to_kategori($xAwal,$xLimit,$xSearch);
          $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
              foreach ($xQuery->result() as $row)
            { 
                $xButtonEdit = '<img src="'.base_url().'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditcontent_to_kategori(\''.$row->idx.'\');" style="border:none;width:20px"/>';
                $xButtonHapus = '<img src="'.base_url().'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapuscontent_to_kategori(\''.$row->idx.'\');" style="border:none;">';
                $xbufResult .= tbaddrow(         tbaddcell($row->idx).
tbaddcell($row->idcontent).
tbaddcell($row->idkategori).
tbaddcell($row->urut).

            tbaddcell($xButtonEdit.'&nbsp/&nbsp'.$xButtonHapus));
            }
          $xInput      = form_input(getArrayObj('edSearch','',' ')); 
          $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchcontent_to_kategori(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
          $xButtonPrev = '<img src="'.base_url().'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchcontent_to_kategori('.($xAwal-$xLimit).');"/>';
          $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>'.$xAwal.' to '.$xLimit.'</button>';
        $xButtonNext = '<img src="'.base_url().'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchcontent_to_kategori('.($xAwal+$xLimit).');" />';
       $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . $xButtonhalaman . $xButtonNext.'</div></div>';
        
      $xbufResult = tablegrid($xbufResult . '</tbody>','','id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>'.'<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
  }

  
function getlistcontent_to_kategoriAndroid(){ 
    $this->load->helper('json');
     $xSearch  = $_POST['search'];
      $xAwal  = $_POST['start'];
      $xLimit = $_POST['limit'];
    $this->load->helper('form');
    $this->load->helper('common');
       $this->json_data['idx'] = "";
$this->json_data['idcontent'] = "";
$this->json_data['idkategori'] = "";
$this->json_data['urut'] = "";

            $response = array();
     $this->load->model('modelcontent_to_kategori');
     $xQuery = $this->modelcontent_to_kategori->getListcontent_to_kategori($xAwal,$xLimit,$xSearch);
      foreach ($xQuery->result() as $row){
                $this->json_data['idx']=$row->idx;
$this->json_data['idcontent']=$row->idcontent;
$this->json_data['idkategori']=$row->idkategori;
$this->json_data['urut']=$row->urut;

            array_push($response, $this->json_data);
        }
      if(empty($response)){        array_push($response, $this->json_data);       }
      echo json_encode($response);

}

function  simpancontent_to_kategoriAndroid(){ 
    $xidx = $_POST['edidx'];
$xidcontent = $_POST['edidcontent'];
$xidkategori = $_POST['edidkategori'];
$xurut = $_POST['edurut'];

            $this->load->helper('json');
     $this->load->model('modelcontent_to_kategori');
     $response = array();if($xidx!='0'){$this->modelcontent_to_kategori->setUpdatecontent_to_kategori($xidx,$xidcontent,$xidkategori,$xurut);
      } else 
     { 
        $this->modelcontent_to_kategori->setInsertcontent_to_kategori($xidx,$xidcontent,$xidkategori,$xurut);
     }
    $row = $this->modelcontent_to_kategori->getLastIndexcontent_to_kategori();
    $this->json_data['idx'] = $row->idx;
$this->json_data['idcontent'] = $row->idcontent;
$this->json_data['idkategori'] = $row->idkategori;
$this->json_data['urut'] = $row->urut;

            $response = array();        
                array_push($response, $this->json_data);          

                echo json_encode($response); }

 function editreccontent_to_kategori(){ 
        $xIdEdit  = $_POST['edidx']; 
        $this->load->model('modelcontent_to_kategori');  
         $row = $this->modelcontent_to_kategori->getDetailcontent_to_kategori($xIdEdit); 
        $this->load->helper('json'); 
      $this->json_data['idx'] = $row->idx;
$this->json_data['idcontent'] = $row->idcontent;
$this->json_data['idkategori'] = $row->idkategori;
$this->json_data['urut'] = $row->urut;

            echo json_encode($this->json_data);
   }
function deletetablecontent_to_kategori(){ 
    $edidx = $_POST['edidx']; 
    $this->load->model('modelcontent_to_kategori'); 
    $this->modelcontent_to_kategori->setDeletecontent_to_kategori($edidx); 
    $this->load->helper('json');
    echo json_encode(null);
  }
function searchcontent_to_kategori(){ 
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
        $this->json_data['tabledatacontent_to_kategori'] = $this->getlistcontent_to_kategori($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal.' to '.($xlimit*$xHal);
    echo json_encode($this->json_data); 
  } 

 function  simpancontent_to_kategori(){ 
        $this->load->helper('json'); 
          if(!empty($_POST['edidx'])) 
        { 
         $xidx =  $_POST['edidx']; 
          } else{ 
         $xidx = '0'; 
         } 
$xidcontent = $_POST['edidcontent'];
$xidkategori = $_POST['edidkategori'];
$xurut = $_POST['edurut'];
          
             $this->load->model('modelcontent_to_kategori'); 
        $idpegawai = $this->session->userdata('idpegawai'); 
        if(!empty($idpegawai)){ 
        if($xidx!='0'){   $xStr =  $this->modelcontent_to_kategori->setUpdatecontent_to_kategori($xidx,$xidcontent,$xidkategori,$xurut); 
         } else 
         { 
           $xStr =  $this->modelcontent_to_kategori->setInsertcontent_to_kategori($xidx,$xidcontent,$xidkategori,$xurut); 
         }} 
               echo json_encode(null);
    } }