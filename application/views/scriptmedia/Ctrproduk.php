<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
    /* Class  Control : produk   *  By Diar */;

      class ctrproduk extends CI_Controller { 
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
        }    $this->session->set_userdata('awal',$xAwal);
          $this->createformproduk('0',$xAwal);
 } 
    
function createformproduk($xidx, $xAwal = 0, $xSearch = '') {
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->model('modelgetmenu');
    $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
    link_tag('resource/css/admin/upload/css/upload.css'). "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxproduk.js"></script>';
    echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormproduk($xidx), '', '', $xAddJs,'' ); 

}
 
function setDetailFormproduk($xidx){
        $this->load->helper('form'); 
          $xBufResult = '';
           $xBufResult = '<div id="stylized" class="myform"><h3>produk</h3><div class="garis"></div>'.form_open_multipart('ctrproduk/inserttable',array('id'=>'form','name'=>'form'));
      $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />'; 
        
$xBufResult .= setForm('edJudul','Judul',form_input(getArrayObj('edJudul','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edDeskripsi','Deskripsi',form_input(getArrayObj('edDeskripsi','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edimage1','image1',form_input(getArrayObj('edimage1','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edimage2','image2',form_input(getArrayObj('edimage2','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edimage3','image3',form_input(getArrayObj('edimage3','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edluas','luas',form_input(getArrayObj('edluas','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edharga','harga',form_input(getArrayObj('edharga','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edidtipe','idtipe',form_input(getArrayObj('edidtipe','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edidkepemilikan','idkepemilikan',form_input(getArrayObj('edidkepemilikan','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edidkelurahan','idkelurahan',form_input(getArrayObj('edidkelurahan','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edlongitude','longitude',form_input(getArrayObj('edlongitude','','200'))).'<div class="spacer"></div>';

$xBufResult .= setForm('edlatitude','latitude',form_input(getArrayObj('edlatitude','','200'))).'<div class="spacer"></div>';

$xBufResult .= '<div class="garis"></div>'.form_button('btSimpan','simpan','onclick="dosimpanproduk();"').form_button('btNew','new','onclick="doClearproduk();"').'<div class="spacer"></div><div id="tabledataproduk">'.$this->getlistproduk(0, ''). '</div><div class="spacer"></div>'; 
       return $xBufResult;

  }
  
function getlistproduk($xAwal,$xSearch){ 
        $xLimit = 10;
        $this->load->helper('form');
        $this->load->helper('common');
         $xbufResult =tbaddrow(         tbaddcell('idx','','width=10%').
tbaddcell('Judul','','width=10%').
tbaddcell('Deskripsi','','width=10%').
tbaddcell('image1','','width=10%').
tbaddcell('image2','','width=10%').
tbaddcell('image3','','width=10%').
tbaddcell('luas','','width=10%').
tbaddcell('harga','','width=10%').
tbaddcell('idtipe','','width=10%').
tbaddcell('idkepemilikan','','width=10%').
tbaddcell('idkelurahan','','width=10%').
tbaddcell('longitude','','width=10%').
tbaddcell('latitude','','width=10%').

            tbaddcell('Edit/Hapus','padding:5px;','width:10%;text-align:center;'),'',TRUE);
         $this->load->model('modelproduk');
         $xQuery = $this->modelproduk->getListproduk($xAwal,$xLimit,$xSearch);
          foreach ($xQuery->result() as $row)
            { 
                $xButtonEdit = '<img src="'.base_url().'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditproduk(\''.$row->idx.'\');" style="border:none;width:20px"/>';
                $xButtonHapus = '<img src="'.base_url().'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusproduk(\''.$row->idx.'\');" style="border:none;">';
                $xbufResult .= tbaddrow(         tbaddcell($row->idx).
tbaddcell($row->Judul).
tbaddcell($row->Deskripsi).
tbaddcell($row->image1).
tbaddcell($row->image2).
tbaddcell($row->image3).
tbaddcell($row->luas).
tbaddcell($row->harga).
tbaddcell($row->idtipe).
tbaddcell($row->idkepemilikan).
tbaddcell($row->idkelurahan).
tbaddcell($row->longitude).
tbaddcell($row->latitude).

            tbaddcell($xButtonEdit.'&nbsp/&nbsp'.$xButtonHapus));
            }
          $xInput      = form_input(getArrayObj('edSearch','','200')); 
          $xButtonSearch = '<img src="'.base_url().'resource/imgbtn/b_view.png" alt="Search Data" onclick = "dosearchproduk(0);" style="border:none;width:30px;height:30px;" />'; 
          $xButtonPrev = '<img src="'.base_url().'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchproduk('.($xAwal-$xLimit).');"/>';
          $xButtonNext = '<img src="'.base_url().'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchproduk('.($xAwal+$xLimit).');" />';
       $xbufResult .= tbaddrow(tbaddcell($xInput.$xButtonSearch,'','width=10% colspan=2') .
             tbaddcell($xButtonPrev . '&nbsp&nbsp' . $xButtonNext, '','width=40% colspan =10') ,'',TRUE);
     $xbufResult = tablegrid($xbufResult);
     return '<div class="tabledata"  style="width:100%;left:-12px;">'.$xbufResult.'</div>';   
  }

  
function getlistprodukAndroid(){ 
    $this->load->helper('json');
     $xSearch  = $_POST['search'];
      $xAwal  = $_POST['start'];
      $xLimit = $_POST['limit'];
    $this->load->helper('form');
    $this->load->helper('common');
       $this->json_data['idx'] = "";
$this->json_data['Judul'] = "";
$this->json_data['Deskripsi'] = "";
$this->json_data['image1'] = "";
$this->json_data['image2'] = "";
$this->json_data['image3'] = "";
$this->json_data['luas'] = "";
$this->json_data['harga'] = "";
$this->json_data['idtipe'] = "";
$this->json_data['idkepemilikan'] = "";
$this->json_data['idkelurahan'] = "";
$this->json_data['longitude'] = "";
$this->json_data['latitude'] = "";

            $response = array();
     $this->load->model('modelproduk');
     $xQuery = $this->modelproduk->getListproduk($xAwal,$xLimit,$xSearch);
      foreach ($xQuery->result() as $row){
                $this->json_data['idx']=$row->idx;
$this->json_data['Judul']=$row->Judul;
$this->json_data['Deskripsi']=$row->Deskripsi;
$this->json_data['image1']=$row->image1;
$this->json_data['image2']=$row->image2;
$this->json_data['image3']=$row->image3;
$this->json_data['luas']=$row->luas;
$this->json_data['harga']=$row->harga;
$this->json_data['idtipe']=$row->idtipe;
$this->json_data['idkepemilikan']=$row->idkepemilikan;
$this->json_data['idkelurahan']=$row->idkelurahan;
$this->json_data['longitude']=$row->longitude;
$this->json_data['latitude']=$row->latitude;

            array_push($response, $this->json_data);
        }
      if(empty($response)){        array_push($response, $this->json_data);       }
      echo json_encode($response);

}

function  simpanprodukAndroid(){ 
    $xidx = $_POST['edidx'];
$xJudul = $_POST['edJudul'];
$xDeskripsi = $_POST['edDeskripsi'];
$ximage1 = $_POST['edimage1'];
$ximage2 = $_POST['edimage2'];
$ximage3 = $_POST['edimage3'];
$xluas = $_POST['edluas'];
$xharga = $_POST['edharga'];
$xidtipe = $_POST['edidtipe'];
$xidkepemilikan = $_POST['edidkepemilikan'];
$xidkelurahan = $_POST['edidkelurahan'];
$xlongitude = $_POST['edlongitude'];
$xlatitude = $_POST['edlatitude'];

            $this->load->helper('json');
     $this->load->model('modelproduk');
     $response = array();if($xidx!='0'){$this->modelproduk->setUpdateproduk($xidx,$xJudul,$xDeskripsi,$ximage1,$ximage2,$ximage3,$xluas,$xharga,$xidtipe,$xidkepemilikan,$xidkelurahan,$xlongitude,$xlatitude);
      } else 
     { 
        $this->modelproduk->setInsertproduk($xidx,$xJudul,$xDeskripsi,$ximage1,$ximage2,$ximage3,$xluas,$xharga,$xidtipe,$xidkepemilikan,$xidkelurahan,$xlongitude,$xlatitude);
     }
    $row = $this->modelproduk->getLastIndexproduk();
    $this->json_data['idx'] = $row->idx;
$this->json_data['Judul'] = $row->Judul;
$this->json_data['Deskripsi'] = $row->Deskripsi;
$this->json_data['image1'] = $row->image1;
$this->json_data['image2'] = $row->image2;
$this->json_data['image3'] = $row->image3;
$this->json_data['luas'] = $row->luas;
$this->json_data['harga'] = $row->harga;
$this->json_data['idtipe'] = $row->idtipe;
$this->json_data['idkepemilikan'] = $row->idkepemilikan;
$this->json_data['idkelurahan'] = $row->idkelurahan;
$this->json_data['longitude'] = $row->longitude;
$this->json_data['latitude'] = $row->latitude;

            $response = array();        
                array_push($response, $this->json_data);          

                echo json_encode($response); }

 function editrecproduk(){ 
        $xIdEdit  = $_POST['edidx']; 
        $this->load->model('modelproduk');  
         $row = $this->modelproduk->getDetailproduk($xIdEdit); 
        $this->load->helper('json'); 
      $this->json_data['idx'] = $row->idx;
$this->json_data['Judul'] = $row->Judul;
$this->json_data['Deskripsi'] = $row->Deskripsi;
$this->json_data['image1'] = $row->image1;
$this->json_data['image2'] = $row->image2;
$this->json_data['image3'] = $row->image3;
$this->json_data['luas'] = $row->luas;
$this->json_data['harga'] = $row->harga;
$this->json_data['idtipe'] = $row->idtipe;
$this->json_data['idkepemilikan'] = $row->idkepemilikan;
$this->json_data['idkelurahan'] = $row->idkelurahan;
$this->json_data['longitude'] = $row->longitude;
$this->json_data['latitude'] = $row->latitude;

            echo json_encode($this->json_data);
   }
function deletetableproduk(){ 
    $edidx = $_POST['edidx']; 
    $this->load->model('modelproduk'); 
    $this->modelproduk->setDeleteproduk($edidx); 
    $this->load->helper('json');
    echo json_encode(null);
  }
function searchproduk(){ 
    $xAwal = $_POST['xAwal']; 
    $xSearch = $_POST['xSearch']; 
    $this->load->helper('json'); 
    if(($xAwal+0)==-99){ 
       $xAwal = $this->session->userdata('awal',$xAwal); 
      } 
   if($xAwal+0<=-1){ 
     $xAwal = 0; 
       $this->session->set_userdata('awal',$xAwal); 
     } else{ 
      $this->session->set_userdata('awal',$xAwal); 
   } 
   $this->json_data['tabledataproduk'] = $this->getlistproduk($xAwal,$xSearch); 
   echo json_encode($this->json_data); 
  } 

 function  simpanproduk(){ 
        $this->load->helper('json'); 
          if(!empty($_POST['edidx'])) 
        { 
         $xidx =  $_POST['edidx']; 
          } else{ 
         $xidx = '0'; 
         } 
$xJudul = $_POST['edJudul'];
$xDeskripsi = $_POST['edDeskripsi'];
$ximage1 = $_POST['edimage1'];
$ximage2 = $_POST['edimage2'];
$ximage3 = $_POST['edimage3'];
$xluas = $_POST['edluas'];
$xharga = $_POST['edharga'];
$xidtipe = $_POST['edidtipe'];
$xidkepemilikan = $_POST['edidkepemilikan'];
$xidkelurahan = $_POST['edidkelurahan'];
$xlongitude = $_POST['edlongitude'];
$xlatitude = $_POST['edlatitude'];
          
             $this->load->model('modelproduk'); 
        $idpegawai = $this->session->userdata('idpegawai'); 
        if(!empty($idpegawai)){ 
        if($xidx!='0'){   $xStr =  $this->modelproduk->setUpdateproduk($xidx,$xJudul,$xDeskripsi,$ximage1,$ximage2,$ximage3,$xluas,$xharga,$xidtipe,$xidkepemilikan,$xidkelurahan,$xlongitude,$xlatitude); 
         } else 
         { 
           $xStr =  $this->modelproduk->setInsertproduk($xidx,$xJudul,$xDeskripsi,$ximage1,$ximage2,$ximage3,$xluas,$xharga,$xidtipe,$xidkepemilikan,$xidkelurahan,$xlongitude,$xlatitude); 
         }} 
               echo json_encode(null);
    } }