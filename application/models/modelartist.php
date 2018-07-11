<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : event
 * di Buat oleh Diar PHP Generator */

class modelartist extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getListevent($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "
                Where idx like '%" . $xSearch . "%' or name like '%" . $xSearch . "%' or address like '%" . $xSearch . "%'
            ";
        }
        $xStr = "SELECT * FROM artist $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailArtist($xidx) {
        $xStr = "SELECT * FROM artist  WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getArtist() {
        $xStr = "SELECT * FROM artist";
        $query = $this->db->query($xStr);
        $row = $query->result_array();
        return $row;
    }

    Function setInsertartist($xnameartist, $xaddressartist, $xsex, $xtanggal) {
        $xStr = " INSERT INTO artist ( name,address,sex,birthdate ) 
                VALUES('" . $xnameartist . "','" . $xaddressartist . "','" . $xsex . "','" . $xtanggal . "')";
        $query = $this->db->query($xStr);
        return $query;
    }

    Function setUpdateartist($xidx, $xnameartist, $xaddressartist, $xsex, $xtanggal) {
        $xStr = " UPDATE artist SET " .
                "name='" . $xnameartist . "'" .
                ",address='" . $xaddressartist . "'" .
                ",sex='" . $xsex . "'" .
                ",birthdate='" . $xtanggal . "'" .
                " WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $query;
    }

    function setDeleteartist($xidx) {
        $xStr = " DELETE FROM artist WHERE artist.idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $this->setInsertLogDeleteevent($xidx);
    }

    function setInsertLogDeleteevent($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'artist',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
