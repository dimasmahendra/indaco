<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
    /* Class  Control : menuutama   *  By Diar */;

      class ctrmenuutama extends CI_Controller { 
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
        $this->createformmenuutama('0',$xAwal);
 } 
    
function createformmenuutama($xidx, $xAwal = 0, $xSearch = '') {
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->model('modelgetmenu');
    $xAddJs = '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/baseurl.js"></script>' .
    link_tag('resource/css/admin/upload/css/upload.css'). "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.knob.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.ui.widget.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/fileupload/jquery.iframe-transport.js"></script>' . "\n" .
    '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/ajax/ajaxmenuutama.js"></script>';
    echo $this->modelgetmenu->SetViewAdmin($this->setDetailFormmenuutama($xidx), '', '', $xAddJs,'','menuutama' ); 

}
 
function setDetailFormmenuutama($xidx){
        $this->load->helper('form'); 
          $xBufResult = '';
           $xBufResult = '<div id="stylized" class="myform">'.form_open_multipart('ctrmenuutama/inserttable',array('id'=>'form','name'=>'form'));
      $this->load->helper('common');
        $xBufResult .= '<input type="hidden" name="edidx" id="edidx" value="0" />'; 
        
$xBufResult .= setForm('menu','menu',form_input(getArrayObj('edmenu','','200'),'',' placeholder="menu" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('slug','slug',form_input(getArrayObj('edslug','','200'),'',' placeholder="slug" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idparent','idparent',form_input(getArrayObj('edidparent','','200'),'',' placeholder="idparent" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idbahasa','idbahasa',form_input(getArrayObj('edidbahasa','','200'),'',' placeholder="idbahasa" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('customlink','customlink',form_input(getArrayObj('edcustomlink','','200'),'',' placeholder="customlink" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('penghubungcontent','penghubungcontent',form_input(getArrayObj('edpenghubungcontent','','200'),'',' placeholder="penghubungcontent" ')).'<div class="spacer"></div>';

$xBufResult .= setForm('idcontent','idcontent',form_input(getArrayObj('edidcontent','','200'),'',' placeholder="idcontent" ')).'<div class="spacer"></div>';

$xBufResult .= '<div class="garis"></div>'.form_button('btSimpan','simpan','onclick="dosimpanmenuutama();"').form_button('btNew','new','onclick="doClearmenuutama();"').'<div class="spacer"></div><div id="tabledatamenuutama">'.$this->getlistmenuutama(0, ''). '</div><div class="spacer"></div>'; 
       return $xBufResult;

  }
  
function getlistmenuutama($xAwal,$xSearch){ 
         $xLimit = $this->session->userdata('limit');
        $this->load->helper('form');
        $this->load->helper('common');
         $xbufResult1 =tbaddrow(         tbaddcellhead('idx','','data-field="idx" data-sortable="true" width=10%').
tbaddcellhead('menu','','data-field="menu" data-sortable="true" width=10%').
tbaddcellhead('slug','','data-field="slug" data-sortable="true" width=10%').
tbaddcellhead('idparent','','data-field="idparent" data-sortable="true" width=10%').
tbaddcellhead('idbahasa','','data-field="idbahasa" data-sortable="true" width=10%').
tbaddcellhead('customlink','','data-field="customlink" data-sortable="true" width=10%').
tbaddcellhead('penghubungcontent','','data-field="penghubungcontent" data-sortable="true" width=10%').
tbaddcellhead('idcontent','','data-field="idcontent" data-sortable="true" width=10%').

            tbaddcellhead('Edit/Hapus','padding:5px;','width:10%;text-align:center;'),'',TRUE);
         $this->load->model('modelmenuutama');
         $xQuery = $this->modelmenuutama->getListmenuutama($xAwal,$xLimit,$xSearch);
          $xbufResult ='<thead>'.$xbufResult1.'</thead>';
        $xbufResult .='<tbody>';
              foreach ($xQuery->result() as $row)
            { 
                $xButtonEdit = '<img src="'.base_url().'resource/imgbtn/edit.png" alt="Edit Data" onclick = "doeditmenuutama(\''.$row->idx.'\');" style="border:none;width:20px"/>';
                $xButtonHapus = '<img src="'.base_url().'resource/imgbtn/delete_table.png" alt="Hapus Data" onclick = "dohapusmenuutama(\''.$row->idx.'\');" style="border:none;">';
                $xbufResult .= tbaddrow(         tbaddcell($row->idx).
tbaddcell($row->menu).
tbaddcell($row->slug).
tbaddcell($row->idparent).
tbaddcell($row->idbahasa).
tbaddcell($row->customlink).
tbaddcell($row->penghubungcontent).
tbaddcell($row->idcontent).

            tbaddcell($xButtonEdit.'&nbsp/&nbsp'.$xButtonHapus));
            }
          $xInput      = form_input(getArrayObj('edSearch','',' ')); 
          $xButtonSearch = '<span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick = "dosearchmenuutama(0);"><i class="fa fa-search"></i>
                                                </button>
                                            </span>';
          $xButtonPrev = '<img src="'.base_url().'resource/imgbtn/b_prevpage.png" style="border:none;width:20px;" onclick = "dosearchmenuutama('.($xAwal-$xLimit).');"/>';
          $xButtonhalaman = '<button id="edHalaman" class="btn btn-default" disabled>'.$xAwal.' to '.$xLimit.'</button>';
        $xButtonNext = '<img src="'.base_url().'resource/imgbtn/b_nextpage.png" style="border:none;width:20px;" onclick = "dosearchmenuutama('.($xAwal+$xLimit).');" />';
       $xbuffoottable = '<div class="foottable"><div class="col-md-6">'.setForm('','',$xInput . $xButtonSearch,'','').'</div>'.
                '<div class="col-md-6">'.$xButtonPrev . $xButtonhalaman . $xButtonNext.'</div></div>';
        
      $xbufResult = tablegrid($xbufResult . '</tbody>','','id="table" data-toggle="table" data-url="" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-query-params="queryParams" data-pagination="true"') . $xbuffoottable;
        $xbufResult .= '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/bootstrap-table/bootstrap-table.js"></script>';
        
        return '<div class="tabledata table-responsive"  style="width:100%;left:-12px;">' . $xbufResult . '</div>'.'<div id="showmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg"></div></div>';
  }

  
function getlistmenuutamaAndroid(){ 
    $this->load->helper('json');
     $xSearch  = $_POST['search'];
      $xAwal  = $_POST['start'];
      $xLimit = $_POST['limit'];
    $this->load->helper('form');
    $this->load->helper('common');
       $this->json_data['idx'] = "";
$this->json_data['menu'] = "";
$this->json_data['slug'] = "";
$this->json_data['idparent'] = "";
$this->json_data['idbahasa'] = "";
$this->json_data['customlink'] = "";
$this->json_data['penghubungcontent'] = "";
$this->json_data['idcontent'] = "";

            $response = array();
     $this->load->model('modelmenuutama');
     $xQuery = $this->modelmenuutama->getListmenuutama($xAwal,$xLimit,$xSearch);
      foreach ($xQuery->result() as $row){
                $this->json_data['idx']=$row->idx;
$this->json_data['menu']=$row->menu;
$this->json_data['slug']=$row->slug;
$this->json_data['idparent']=$row->idparent;
$this->json_data['idbahasa']=$row->idbahasa;
$this->json_data['customlink']=$row->customlink;
$this->json_data['penghubungcontent']=$row->penghubungcontent;
$this->json_data['idcontent']=$row->idcontent;

            array_push($response, $this->json_data);
        }
      if(empty($response)){        array_push($response, $this->json_data);       }
      echo json_encode($response);

}

function  simpanmenuutamaAndroid(){ 
    $xidx = $_POST['edidx'];
$xmenu = $_POST['edmenu'];
$xslug = $_POST['edslug'];
$xidparent = $_POST['edidparent'];
$xidbahasa = $_POST['edidbahasa'];
$xcustomlink = $_POST['edcustomlink'];
$xpenghubungcontent = $_POST['edpenghubungcontent'];
$xidcontent = $_POST['edidcontent'];

            $this->load->helper('json');
     $this->load->model('modelmenuutama');
     $response = array();if($xidx!='0'){$this->modelmenuutama->setUpdatemenuutama($xidx,$xmenu,$xslug,$xidparent,$xidbahasa,$xcustomlink,$xpenghubungcontent,$xidcontent);
      } else 
     { 
        $this->modelmenuutama->setInsertmenuutama($xidx,$xmenu,$xslug,$xidparent,$xidbahasa,$xcustomlink,$xpenghubungcontent,$xidcontent);
     }
    $row = $this->modelmenuutama->getLastIndexmenuutama();
    $this->json_data['idx'] = $row->idx;
$this->json_data['menu'] = $row->menu;
$this->json_data['slug'] = $row->slug;
$this->json_data['idparent'] = $row->idparent;
$this->json_data['idbahasa'] = $row->idbahasa;
$this->json_data['customlink'] = $row->customlink;
$this->json_data['penghubungcontent'] = $row->penghubungcontent;
$this->json_data['idcontent'] = $row->idcontent;

            $response = array();        
                array_push($response, $this->json_data);          

                echo json_encode($response); }

 function editrecmenuutama(){ 
        $xIdEdit  = $_POST['edidx']; 
        $this->load->model('modelmenuutama');  
         $row = $this->modelmenuutama->getDetailmenuutama($xIdEdit); 
        $this->load->helper('json'); 
      $this->json_data['idx'] = $row->idx;
$this->json_data['menu'] = $row->menu;
$this->json_data['slug'] = $row->slug;
$this->json_data['idparent'] = $row->idparent;
$this->json_data['idbahasa'] = $row->idbahasa;
$this->json_data['customlink'] = $row->customlink;
$this->json_data['penghubungcontent'] = $row->penghubungcontent;
$this->json_data['idcontent'] = $row->idcontent;

            echo json_encode($this->json_data);
   }
function deletetablemenuutama(){ 
    $edidx = $_POST['edidx']; 
    $this->load->model('modelmenuutama'); 
    $this->modelmenuutama->setDeletemenuutama($edidx); 
    $this->load->helper('json');
    echo json_encode(null);
  }
function searchmenuutama(){ 
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
        $this->json_data['tabledatamenuutama'] = $this->getlistmenuutama($xAwal, $xSearch);
        $this->json_data['halaman'] = $xAwal.' to '.($xlimit*$xHal);
    echo json_encode($this->json_data); 
  } 

 function  simpanmenuutama(){ 
        $this->load->helper('json'); 
          if(!empty($_POST['edidx'])) 
        { 
         $xidx =  $_POST['edidx']; 
          } else{ 
         $xidx = '0'; 
         } 
$xmenu = $_POST['edmenu'];
$xslug = $_POST['edslug'];
$xidparent = $_POST['edidparent'];
$xidbahasa = $_POST['edidbahasa'];
$xcustomlink = $_POST['edcustomlink'];
$xpenghubungcontent = $_POST['edpenghubungcontent'];
$xidcontent = $_POST['edidcontent'];
          
             $this->load->model('modelmenuutama'); 
        $idpegawai = $this->session->userdata('idpegawai'); 
        if(!empty($idpegawai)){ 
        if($xidx!='0'){   $xStr =  $this->modelmenuutama->setUpdatemenuutama($xidx,$xmenu,$xslug,$xidparent,$xidbahasa,$xcustomlink,$xpenghubungcontent,$xidcontent); 
         } else 
         { 
           $xStr =  $this->modelmenuutama->setInsertmenuutama($xidx,$xmenu,$xslug,$xidparent,$xidbahasa,$xcustomlink,$xpenghubungcontent,$xidcontent); 
         }} 
               echo json_encode(null);
    } }