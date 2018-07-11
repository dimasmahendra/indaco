<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
/* Class  Model : publishing
 * di Buat oleh Diar PHP Generator*/

  class modelpublishing extends CI_Model {
  function __construct()
 {
    parent::__construct();
 }


    
function getArrayListpublishing(){ /* spertinya perlu lock table*/ 
 $xBuffResul = array(); 
 $xStr =  "SELECT ".
      "idx".",title".
",description".
",keyword".
",idmetatag".
",image".
",video".
",audio".
",pdf".
",update".
",iduser".
",idimage".

" FROM publishing   order by idx ASC "; 
 $query = $this->db->query($xStr); 
 foreach ($query->result() as $row) 
 { 
   $xBuffResul[$row->idx] = $row->idx; 
   } 
return $xBuffResul;
}
    
function getListpublishing($xAwal,$xLimit,$xSearch=''){
if(!empty($xSearch)){ 
     $xSearch = "Where idx like '%".$xSearch."%'" ;
 }   
 $xStr =   "SELECT ".
      "idx".
      ",title".
",description".
",keyword".
",idmetatag".
",image".
",video".
",audio".
",pdf".
",update".
",iduser".
",idimage".
" FROM publishing $xSearch order by idx DESC limit ".$xAwal.",".$xLimit;  
 $query = $this->db->query($xStr);
 return $query ;
}

 
function getDetailpublishing($xidx){
 $xStr =   "SELECT ".
      "idx".
   ",title".
",description".
",keyword".
",idmetatag".
",image".
",video".
",audio".
",pdf".
",update".
",iduser".
",idimage".

" FROM publishing  WHERE idx = '".$xidx."'";

 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}

  
function getLastIndexpublishing(){ /* spertinya perlu lock table*/ 
 $xStr =   "SELECT ".
      "idx".
      ",title".
",description".
",keyword".
",idmetatag".
",image".
",video".
",audio".
",pdf".
",update".
",iduser".
",idimage".

" FROM publishing order by idx DESC limit 1 ";
 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}


  
 Function setInsertpublishing($xidx,$xtitle,$xdescription,$xkeyword,$xidmetatag,$ximage,$xvideo,$xaudio,$xpdf,$xupdate,$xiduser,$xidimage)
{
  $xStr =  " INSERT INTO publishing( ".
              "idx".
              ",title".
",description".
",keyword".
",idmetatag".
",image".
",video".
",audio".
",pdf".
",update".
",iduser".
",idimage".
") VALUES('".$xidx."','".$xtitle."','".$xdescription."','".$xkeyword."','".$xidmetatag."','".$ximage."','".$xvideo."','".$xaudio."','".$xpdf."','".$xupdate."','".$xiduser."','".$xidimage."')";
$query = $this->db->query($xStr);
 return $xidx;
}

Function setUpdatepublishing($xidx,$xtitle,$xdescription,$xkeyword,$xidmetatag,$ximage,$xvideo,$xaudio,$xpdf,$xupdate,$xiduser,$xidimage)
{
  $xStr =  " UPDATE publishing SET ".
             "idx='".$xidx."'".
              ",title='".$xtitle."'".
 ",description='".$xdescription."'".
 ",keyword='".$xkeyword."'".
 ",idmetatag='".$xidmetatag."'".
 ",image='".$ximage."'".
 ",video='".$xvideo."'".
 ",audio='".$xaudio."'".
 ",pdf='".$xpdf."'".
 ",update='".$xupdate."'".
 ",iduser='".$xiduser."'".
 ",idimage='".$xidimage."'".
 "WHERE idx = '".$xidx."'";
 $query = $this->db->query($xStr);
 return $xidx;
}

function setDeletepublishing($xidx)
{
 $xStr =  " DELETE FROM publishing WHERE publishing.idx = '".$xidx."'";

 $query = $this->db->query($xStr);
 $this->setInsertLogDeletepublishing($xidx);
}

function setInsertLogDeletepublishing($xidx)
{
 $xidpegawai = $this->session->userdata('idpegawai');    $xStr="insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'publishing',now(),$xidpegawai)"; 
    $query = $this->db->query($xStr);
}

}
