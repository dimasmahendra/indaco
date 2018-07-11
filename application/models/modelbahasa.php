<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : bahasa
 * di Buat oleh Diar PHP Generator */

class modelbahasa extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListbahasa() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",bahasa" .
                ",slug" .
                " FROM bahasa   order by idx ASC ";
        $query = $this->db->query($xStr);
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->bahasa;
        }
        return $xBuffResul;
    }

    function getListbahasa($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "Where idx like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",bahasa" .
                ",slug" .
                " FROM bahasa $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailbahasa($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",bahasa" .
                ",slug" .
                " FROM bahasa  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexbahasa() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",bahasa" .
                ",slug" .
                " FROM bahasa order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertbahasa($xidx, $xbahasa, $xslug) {
        $xStr = " INSERT INTO bahasa( " .
                "idx" .
                ",bahasa" .
                ",slug" .
                ") VALUES('" . $xidx . "','" . $xbahasa . "','" . $xslug . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdatebahasa($xidx, $xbahasa, $xslug) {
        $xStr = " UPDATE bahasa SET " .
                "idx='" . $xidx . "'" .
                ",bahasa='" . $xbahasa . "'" .
                ",slug='" . $xslug . "'" .
                "WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeletebahasa($xidx) {
        $xStr = " DELETE FROM bahasa WHERE bahasa.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeletebahasa($xidx);
    }

    function setInsertLogDeletebahasa($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'bahasa',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
