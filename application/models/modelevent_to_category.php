<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
/* Class  Model : event_to_category
 * di Buat oleh Diar PHP Generator*/

  class modelevent_to_category extends CI_Model {
  function __construct()
 {
    parent::__construct();
 }


    
function getArrayListevent_to_category(){ /* spertinya perlu lock table*/ 
 $xBuffResul = array(); 
 $xStr =  "SELECT ".
      "idx".",idevent".
",idcategory".

" FROM event_to_category   order by idx ASC "; 
 $query = $this->db->query($xStr); 
 foreach ($query->result() as $row) 
 { 
   $xBuffResul[$row->idx] = $row->idx; 
   } 
return $xBuffResul;
}
    
function getListevent_to_category($xAwal,$xLimit,$xSearch=''){
if(!empty($xSearch)){ 
     $xSearch = "Where idx like '%".$xSearch."%'" ;
 }   
 $xStr =   "SELECT ".
      "idx".
      ",idevent".
",idcategory".
" FROM event_to_category $xSearch order by idx DESC limit ".$xAwal.",".$xLimit;  
 $query = $this->db->query($xStr);
 return $query ;
}

 
function getDetailevent_to_category($xidx){
 $xStr =   "SELECT ".
      "idx".
   ",idevent".
",idcategory".

" FROM event_to_category  WHERE idx = '".$xidx."'";

 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}

  
function getLastIndexevent_to_category(){ /* spertinya perlu lock table*/ 
 $xStr =   "SELECT ".
      "idx".
      ",idevent".
",idcategory".

" FROM event_to_category order by idx DESC limit 1 ";
 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}


  
 Function setInsertevent_to_category($xidx,$xidevent,$xidcategory)
{
  $xStr =  " INSERT INTO event_to_category( ".
              "idx".
              ",idevent".
",idcategory".
") VALUES('".$xidx."','".$xidevent."','".$xidcategory."')";
$query = $this->db->query($xStr);
 return $xidx;
}

Function setUpdateevent_to_category($xidx,$xidevent,$xidcategory)
{
  $xStr =  " UPDATE event_to_category SET ".
             "idx='".$xidx."'".
              ",idevent='".$xidevent."'".
 ",idcategory='".$xidcategory."'".
 "WHERE idx = '".$xidx."'";
 $query = $this->db->query($xStr);
 return $xidx;
}

function setDeleteevent_to_category($xidx)
{
 $xStr =  " DELETE FROM event_to_category WHERE event_to_category.idx = '".$xidx."'";

 $query = $this->db->query($xStr);
 $this->setInsertLogDeleteevent_to_category($xidx);
}

function setInsertLogDeleteevent_to_category($xidx)
{
 $xidpegawai = $this->session->userdata('idpegawai');    $xStr="insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'event_to_category',now(),$xidpegawai)"; 
    $query = $this->db->query($xStr);
}

}
