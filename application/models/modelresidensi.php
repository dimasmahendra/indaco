<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
/* Class  Model : residensi
 * di Buat oleh Diar PHP Generator*/

  class modelresidensi extends CI_Model {
  function __construct()
 {
    parent::__construct();
 }


    
function getArrayListresidensi(){ /* spertinya perlu lock table*/ 
 $xBuffResul = array(); 
 $xStr =  "SELECT ".
      "idx".",title".
",description".
",datestart".
",dateend".
",image".
",istampil".
",keyword".
",idartist".
",idmetatag".
",idbahasa".
",idimage".
",update".
",iduser".

" FROM residensi   order by idx ASC "; 
 $query = $this->db->query($xStr); 
 foreach ($query->result() as $row) 
 { 
   $xBuffResul[$row->idx] = $row->idx; 
   } 
return $xBuffResul;
}
    
function getListresidensi($xAwal,$xLimit,$xSearch=''){
if(!empty($xSearch)){ 
     $xSearch = "Where idx like '%".$xSearch."%'" ;
 }   
 $xStr =   "SELECT ".
      "idx".
      ",title".
",description".
",datestart".
",dateend".
",image".
",istampil".
",keyword".
",idartist".
",idmetatag".
",idbahasa".
",idimage".
",update".
",iduser".
" FROM residensi $xSearch order by idx DESC limit ".$xAwal.",".$xLimit;  
 $query = $this->db->query($xStr);
 return $query ;
}

 
function getDetailresidensi($xidx){
 $xStr =   "SELECT ".
      "idx".
   ",title".
",description".
",datestart".
",dateend".
",image".
",istampil".
",keyword".
",idartist".
",idmetatag".
",idbahasa".
",idimage".
",update".
",iduser".

" FROM residensi  WHERE idx = '".$xidx."'";

 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}

  
function getLastIndexresidensi(){ /* spertinya perlu lock table*/ 
 $xStr =   "SELECT ".
      "idx".
      ",title".
",description".
",datestart".
",dateend".
",image".
",istampil".
",keyword".
",idartist".
",idmetatag".
",idbahasa".
",idimage".
",update".
",iduser".

" FROM residensi order by idx DESC limit 1 ";
 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}


  
 Function setInsertresidensi($xidx,$xtitle,$xdescription,$xdatestart,$xdateend,$ximage,$xistampil,$xkeyword,$xidartist,$xidmetatag,$xidbahasa,$xidimage,$xupdate,$xiduser)
{
  $xStr =  " INSERT INTO residensi( ".
              "idx".
              ",title".
",description".
",datestart".
",dateend".
",image".
",istampil".
",keyword".
",idartist".
",idmetatag".
",idbahasa".
",idimage".
",update".
",iduser".
") VALUES('".$xidx."','".$xtitle."','".$xdescription."','".$xdatestart."','".$xdateend."','".$ximage."','".$xistampil."','".$xkeyword."','".$xidartist."','".$xidmetatag."','".$xidbahasa."','".$xidimage."','".$xupdate."','".$xiduser."')";
$query = $this->db->query($xStr);
 return $xidx;
}

Function setUpdateresidensi($xidx,$xtitle,$xdescription,$xdatestart,$xdateend,$ximage,$xistampil,$xkeyword,$xidartist,$xidmetatag,$xidbahasa,$xidimage,$xupdate,$xiduser)
{
  $xStr =  " UPDATE residensi SET ".
             "idx='".$xidx."'".
              ",title='".$xtitle."'".
 ",description='".$xdescription."'".
 ",datestart='".$xdatestart."'".
 ",dateend='".$xdateend."'".
 ",image='".$ximage."'".
 ",istampil='".$xistampil."'".
 ",keyword='".$xkeyword."'".
 ",idartist='".$xidartist."'".
 ",idmetatag='".$xidmetatag."'".
 ",idbahasa='".$xidbahasa."'".
 ",idimage='".$xidimage."'".
 ",update='".$xupdate."'".
 ",iduser='".$xiduser."'".
 "WHERE idx = '".$xidx."'";
 $query = $this->db->query($xStr);
 return $xidx;
}

function setDeleteresidensi($xidx)
{
 $xStr =  " DELETE FROM residensi WHERE residensi.idx = '".$xidx."'";

 $query = $this->db->query($xStr);
 $this->setInsertLogDeleteresidensi($xidx);
}

function setInsertLogDeleteresidensi($xidx)
{
 $xidpegawai = $this->session->userdata('idpegawai');    $xStr="insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'residensi',now(),$xidpegawai)"; 
    $query = $this->db->query($xStr);
}

}
