<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
/* Class  Model : content_to_kategori
 * di Buat oleh Diar PHP Generator*/

  class modelcontent_to_kategori extends CI_Model {
  function __construct()
 {
    parent::__construct();
 }


    
function getArrayListcontent_to_kategori(){ /* spertinya perlu lock table*/ 
 $xBuffResul = array(); 
 $xStr =  "SELECT ".
      "idx".",idcontent".
",idkategori".
",urut".

" FROM content_to_kategori   order by idx ASC "; 
 $query = $this->db->query($xStr); 
 foreach ($query->result() as $row) 
 { 
   $xBuffResul[$row->idx] = $row->idx; 
   } 
return $xBuffResul;
}
    
function getListcontent_to_kategori($xAwal,$xLimit,$xSearch=''){
if(!empty($xSearch)){ 
     $xSearch = "Where idx like '%".$xSearch."%'" ;
 }   
 $xStr =   "SELECT ".
      "idx".
      ",idcontent".
",idkategori".
",urut".
" FROM content_to_kategori $xSearch order by idx DESC limit ".$xAwal.",".$xLimit;  
 $query = $this->db->query($xStr);
 return $query ;
}

 
function getDetailcontent_to_kategori($xidx){
 $xStr =   "SELECT ".
      "idx".
   ",idcontent".
",idkategori".
",urut".

" FROM content_to_kategori  WHERE idx = '".$xidx."'";

 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}

  
function getLastIndexcontent_to_kategori(){ /* spertinya perlu lock table*/ 
 $xStr =   "SELECT ".
      "idx".
      ",idcontent".
",idkategori".
",urut".

" FROM content_to_kategori order by idx DESC limit 1 ";
 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}


  
 Function setInsertcontent_to_kategori($xidx,$xidcontent,$xidkategori,$xurut)
{
  $xStr =  " INSERT INTO content_to_kategori( ".
              "idx".
              ",idcontent".
",idkategori".
",urut".
") VALUES('".$xidx."','".$xidcontent."','".$xidkategori."','".$xurut."')";
$query = $this->db->query($xStr);
 return $xidx;
}

Function setUpdatecontent_to_kategori($xidx,$xidcontent,$xidkategori,$xurut)
{
  $xStr =  " UPDATE content_to_kategori SET ".
             "idx='".$xidx."'".
              ",idcontent='".$xidcontent."'".
 ",idkategori='".$xidkategori."'".
 ",urut='".$xurut."'".
 "WHERE idx = '".$xidx."'";
 $query = $this->db->query($xStr);
 return $xidx;
}

function setDeletecontent_to_kategori($xidx)
{
 $xStr =  " DELETE FROM content_to_kategori WHERE content_to_kategori.idx = '".$xidx."'";

 $query = $this->db->query($xStr);
 $this->setInsertLogDeletecontent_to_kategori($xidx);
}

function setInsertLogDeletecontent_to_kategori($xidx)
{
 $xidpegawai = $this->session->userdata('idpegawai');    $xStr="insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'content_to_kategori',now(),$xidpegawai)"; 
    $query = $this->db->query($xStr);
}

}
