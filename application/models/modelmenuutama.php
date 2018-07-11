<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 
/* Class  Model : menuutama
 * di Buat oleh Diar PHP Generator*/

  class modelmenuutama extends CI_Model {
  function __construct()
 {
    parent::__construct();
 }


    
function getArrayListmenuutama(){ /* spertinya perlu lock table*/ 
 $xBuffResul = array(); 
 $xStr =  "SELECT ".
      "idx".",menu".
",slug".
",idparent".
",idbahasa".
",customlink".
",penghubungcontent".
",idcontent".

" FROM menuutama   order by idx ASC "; 
 $query = $this->db->query($xStr); 
 foreach ($query->result() as $row) 
 { 
   $xBuffResul[$row->idx] = $row->idx; 
   } 
return $xBuffResul;
}
    
function getListmenuutama($xAwal,$xLimit,$xSearch=''){
if(!empty($xSearch)){ 
     $xSearch = "Where idx like '%".$xSearch."%'" ;
 }   
 $xStr =   "SELECT ".
      "idx".
      ",menu".
",slug".
",idparent".
",idbahasa".
",customlink".
",penghubungcontent".
",idcontent".
" FROM menuutama $xSearch order by idx DESC limit ".$xAwal.",".$xLimit;  
 $query = $this->db->query($xStr);
 return $query ;
}

 
function getDetailmenuutama($xidx){
 $xStr =   "SELECT ".
      "idx".
   ",menu".
",slug".
",idparent".
",idbahasa".
",customlink".
",penghubungcontent".
",idcontent".

" FROM menuutama  WHERE idx = '".$xidx."'";

 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}

  
function getLastIndexmenuutama(){ /* spertinya perlu lock table*/ 
 $xStr =   "SELECT ".
      "idx".
      ",menu".
",slug".
",idparent".
",idbahasa".
",customlink".
",penghubungcontent".
",idcontent".

" FROM menuutama order by idx DESC limit 1 ";
 $query = $this->db->query($xStr);
$row = $query->row();
 return $row;
}


  
 Function setInsertmenuutama($xidx,$xmenu,$xslug,$xidparent,$xidbahasa,$xcustomlink,$xpenghubungcontent,$xidcontent)
{
  $xStr =  " INSERT INTO menuutama( ".
              "idx".
              ",menu".
",slug".
",idparent".
",idbahasa".
",customlink".
",penghubungcontent".
",idcontent".
") VALUES('".$xidx."','".$xmenu."','".$xslug."','".$xidparent."','".$xidbahasa."','".$xcustomlink."','".$xpenghubungcontent."','".$xidcontent."')";
$query = $this->db->query($xStr);
 return $xidx;
}

Function setUpdatemenuutama($xidx,$xmenu,$xslug,$xidparent,$xidbahasa,$xcustomlink,$xpenghubungcontent,$xidcontent)
{
  $xStr =  " UPDATE menuutama SET ".
             "idx='".$xidx."'".
              ",menu='".$xmenu."'".
 ",slug='".$xslug."'".
 ",idparent='".$xidparent."'".
 ",idbahasa='".$xidbahasa."'".
 ",customlink='".$xcustomlink."'".
 ",penghubungcontent='".$xpenghubungcontent."'".
 ",idcontent='".$xidcontent."'".
 "WHERE idx = '".$xidx."'";
 $query = $this->db->query($xStr);
 return $xidx;
}

function setDeletemenuutama($xidx)
{
 $xStr =  " DELETE FROM menuutama WHERE menuutama.idx = '".$xidx."'";

 $query = $this->db->query($xStr);
 $this->setInsertLogDeletemenuutama($xidx);
}

function setInsertLogDeletemenuutama($xidx)
{
 $xidpegawai = $this->session->userdata('idpegawai');    $xStr="insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'menuutama',now(),$xidpegawai)"; 
    $query = $this->db->query($xStr);
}

}
