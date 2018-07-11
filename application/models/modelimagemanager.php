<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : imagemanager
 * di Buat oleh Diar PHP Generator */

class modelimagemanager extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListimagemanager() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",image" .
                ",title" .
                ",description" .
                ",alt" .
                ",`update`" .
                " FROM imagemanager   order by idx ASC ";
        $query = $this->db->query($xStr);
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->idx;
        }
        return $xBuffResul;
    }

    function getListimagemanager($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "Where idx like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",image" .
                ",title" .
                ",description" .
                ",alt" .
                ",`update`" .
                " FROM imagemanager $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailimagemanager($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",image" .
                ",title" .
                ",description" .
                ",alt" .
                ",`update`" .
                " FROM imagemanager  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndeximagemanager() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",image" .
                ",title" .
                ",description" .
                ",alt" .
                ",`update`" .
                " FROM imagemanager order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertimagemanager($xidx, $ximage, $xtitle, $xdescription, $xalt, $xupdate) {
        $xStr = " INSERT INTO imagemanager( " .
                "idx" .
                ",image" .
                ",title" .
                ",description" .
                ",alt" .
                ",`update`" .
                ") VALUES('" . $xidx . "','" . $ximage . "','" . $xtitle . "','" . $xdescription . "','" . $xalt . "','" . $xupdate . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdateimagemanager($xidx, $ximage, $xtitle, $xdescription, $xalt, $xupdate) {
        $xStr = " UPDATE imagemanager SET " .
                "idx='" . $xidx . "'" .
                ",image='" . $ximage . "'" .
                ",title='" . $xtitle . "'" .
                ",description='" . $xdescription . "'" .
                ",alt='" . $xalt . "'" .
                ",update='" . $xupdate . "'" .
                "WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeleteimagemanager($xidx) {
        $xStr = " DELETE FROM imagemanager WHERE imagemanager.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeleteimagemanager($xidx);
    }

    function setInsertLogDeleteimagemanager($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'imagemanager',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
