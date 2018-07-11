<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : view
 * di Buat oleh Diar PHP Generator */

class modelview extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListview() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",idproduk" .
                ",view" .
                ",ip" .
                ",filter" .
                ",tanggal" .
                " FROM view   order by idx ASC ";
        $query = $this->db->query($xStr);
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->idx;
        }
        return $xBuffResul;
    }

    function getListview($xAwal, $xLimit, $xedtanggalmulai='',$xedtanggalakhir = '') {
        $this->load->helper('common');
        $xSearch='Where idx is not null ';
        if (!empty($xedtanggalmulai)) {
            $xSearch .= " AND tanggal >= '" . datetomysql($xedtanggalmulai) . "'";
        }
        if (!empty($xedtanggalakhir)) {
            $xSearch .= " AND tanggal <= '" . datetomysql($xedtanggalakhir) . "'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",idproduk" .
                ",view" .
                ",ip" .
                ",filter" .
                ",tanggal" .
                " FROM view $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailview($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",idproduk" .
                ",view" .
                ",ip" .
                ",filter" .
                ",tanggal" .
                " FROM view  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexview() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",idproduk" .
                ",view" .
                ",ip" .
                ",filter" .
                ",tanggal" .
                " FROM view order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertview($xidx, $xidproduk, $xview, $xip, $xfilter, $xtanggal) {
        $xStr = " INSERT INTO view( " .
                "idx" .
                ",idproduk" .
                ",view" .
                ",ip" .
                ",filter" .
                ",tanggal" .
                ") VALUES('" . $xidx . "','" . $xidproduk . "','" . $xview . "','" . $xip . "','" . $xfilter . "',NOW())";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdateview($xidx, $xidproduk, $xview, $xip, $xfilter, $xtanggal) {
        $xStr = " UPDATE view SET " .
                "idx='" . $xidx . "'" .
                ",idproduk='" . $xidproduk . "'" .
                ",view='" . $xview . "'" .
                ",ip='" . $xip . "'" .
                ",filter='" . $xfilter . "'" .
                ",tanggal='" . $xtanggal . "'" .
                "WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeleteview($xidx) {
        $xStr = " DELETE FROM view WHERE view.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeleteview($xidx);
    }

    function setInsertLogDeleteview($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'view',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
