<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
/* Class  Model : content_to_tag
 * di Buat oleh Diar PHP Generator*/

  class modelcontent_to_tag extends CI_Model {
  function __construct()
 {
    parent::__construct();
 }


    
function getArrayListcontent_to_tag(){ /* spertinya perlu lock table*/ 
 $xBuffResul = array(); 
 $xStr =  "SELECT ".
      "idx".",idcontent".
",idmeatatag".

" FROM content_to_tag   order by idx ASC "; 
 $query = $this->db->query($xStr); 
 foreach ($query->result() as $row) 
 { 
   $xBuffResul[$row->idx] = $row->idx; 
   } 
return $xBuffResul;
}
    
function getListcontent_to_tag($xAwal,$xLimit,$xSearch=''){
if(!empty($xSearch)){ 
     $xSearch = "Where idx like '%".$xSearch."%'" ;
 }   
 $xStr =   "SELECT ".
      "idx".
      ",idcontent".
",idmeatatag".
" FROM content_to_tag $xSearch order by idx DESC limit ".$xAwal.",".$xLimit;  
 $query = $this->db->query($xStr);
 return $query ;
}

 
function getDetailcontent_to_tag($xidx){
 $xStr =   "SELECT ".
      "idx".
   ",idcontent".
",idmeatatag".

" FROM content_to_tag  WHERE idx = '".$xidx."'";

 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}

  
function getLastIndexcontent_to_tag(){ /* spertinya perlu lock table*/ 
 $xStr =   "SELECT ".
      "idx".
      ",idcontent".
",idmeatatag".

" FROM content_to_tag order by idx DESC limit 1 ";
 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}


  
 Function setInsertcontent_to_tag($xidx,$xidcontent,$xidmeatatag)
{
  $xStr =  " INSERT INTO content_to_tag( ".
              "idx".
              ",idcontent".
",idmeatatag".
") VALUES('".$xidx."','".$xidcontent."','".$xidmeatatag."')";
$query = $this->db->query($xStr);
 return $xidx;
}

Function setUpdatecontent_to_tag($xidx,$xidcontent,$xidmeatatag)
{
  $xStr =  " UPDATE content_to_tag SET ".
             "idx='".$xidx."'".
              ",idcontent='".$xidcontent."'".
 ",idmeatatag='".$xidmeatatag."'".
 "WHERE idx = '".$xidx."'";
 $query = $this->db->query($xStr);
 return $xidx;
}

function setDeletecontent_to_tag($xidx)
{
 $xStr =  " DELETE FROM content_to_tag WHERE content_to_tag.idx = '".$xidx."'";

 $query = $this->db->query($xStr);
 $this->setInsertLogDeletecontent_to_tag($xidx);
}

function setInsertLogDeletecontent_to_tag($xidx)
{
 $xidpegawai = $this->session->userdata('idpegawai');    $xStr="insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'content_to_tag',now(),$xidpegawai)"; 
    $query = $this->db->query($xStr);
}

}
