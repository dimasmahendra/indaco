<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
/* Class  Model : content_to_image
 * di Buat oleh Diar PHP Generator*/

  class modelcontent_to_image extends CI_Model {
  function __construct()
 {
    parent::__construct();
 }


    
function getArrayListcontent_to_image(){ /* spertinya perlu lock table*/ 
 $xBuffResul = array(); 
 $xStr =  "SELECT ".
      "idx".",idcontent".
",idimage".

" FROM content_to_image   order by idx ASC "; 
 $query = $this->db->query($xStr); 
 foreach ($query->result() as $row) 
 { 
   $xBuffResul[$row->idx] = $row->idx; 
   } 
return $xBuffResul;
}
    
function getListcontent_to_image($xAwal,$xLimit,$xSearch=''){
if(!empty($xSearch)){ 
     $xSearch = "Where idx like '%".$xSearch."%'" ;
 }   
 $xStr =   "SELECT ".
      "idx".
      ",idcontent".
",idimage".
" FROM content_to_image $xSearch order by idx DESC limit ".$xAwal.",".$xLimit;  
 $query = $this->db->query($xStr);
 return $query ;
}

 
function getDetailcontent_to_image($xidx){
 $xStr =   "SELECT ".
      "idx".
   ",idcontent".
",idimage".

" FROM content_to_image  WHERE idx = '".$xidx."'";

 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}

  
function getLastIndexcontent_to_image(){ /* spertinya perlu lock table*/ 
 $xStr =   "SELECT ".
      "idx".
      ",idcontent".
",idimage".

" FROM content_to_image order by idx DESC limit 1 ";
 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}


  
 Function setInsertcontent_to_image($xidx,$xidcontent,$xidimage)
{
  $xStr =  " INSERT INTO content_to_image( ".
              "idx".
              ",idcontent".
",idimage".
") VALUES('".$xidx."','".$xidcontent."','".$xidimage."')";
$query = $this->db->query($xStr);
 return $xidx;
}

Function setUpdatecontent_to_image($xidx,$xidcontent,$xidimage)
{
  $xStr =  " UPDATE content_to_image SET ".
             "idx='".$xidx."'".
              ",idcontent='".$xidcontent."'".
 ",idimage='".$xidimage."'".
 "WHERE idx = '".$xidx."'";
 $query = $this->db->query($xStr);
 return $xidx;
}

function setDeletecontent_to_image($xidx)
{
 $xStr =  " DELETE FROM content_to_image WHERE content_to_image.idx = '".$xidx."'";

 $query = $this->db->query($xStr);
 $this->setInsertLogDeletecontent_to_image($xidx);
}

function setInsertLogDeletecontent_to_image($xidx)
{
 $xidpegawai = $this->session->userdata('idpegawai');    $xStr="insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'content_to_image',now(),$xidpegawai)"; 
    $query = $this->db->query($xStr);
}

}
