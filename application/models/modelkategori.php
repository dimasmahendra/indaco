<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : kategori
 * di Buat oleh Diar PHP Generator */

class modelkategori extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListkategori() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",kategori" .
                ",idparent" .
                ",deskripsi" .
                ",image" .
                " FROM kategori   order by idx ASC ";
        $query = $this->db->query($xStr);
        $xBuffResul[0] = '-kategori-';
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->kategori;
        }
        return $xBuffResul;
    }

    function getListkategoribyparent($xSearch) {
        if (!empty($xSearch)) {
            $xSearch = "Where idparent ='" . $xSearch . "'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",kategori" .
                ",idparent" .
                ",deskripsi" .
                ",image" .
                " FROM kategori $xSearch order by kategori ASC";
        $query = $this->db->query($xStr);
        return $query;
    }
    function getListkategori($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "Where idx like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",kategori" .
                ",idparent" .
                ",deskripsi" .
                ",image" .
                " FROM kategori $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }
   

    function getDetailkategori($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",kategori" .
                ",idparent" .
                ",deskripsi" .
                ",image" .
                " FROM kategori  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexkategori() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",kategori" .
                ",idparent" .
                ",deskripsi" .
                ",image" .
                " FROM kategori order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertkategori($xidx, $xkategori, $xidparent, $xdeskripsi, $ximage) {
        $xStr = " INSERT INTO kategori( " .
                "idx" .
                ",kategori" .
                ",idparent" .
                ",deskripsi" .
                ",image" .
                ") VALUES('" . $xidx . "','" . $xkategori . "','" . $xidparent . "','" . $xdeskripsi . "','" . $ximage . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdatekategori($xidx, $xkategori, $xidparent, $xdeskripsi, $ximage) {
        $xStr = " UPDATE kategori SET " .
                "idx='" . $xidx . "'" .
                ",kategori='" . $xkategori . "'" .
                ",idparent='" . $xidparent . "'" .
                ",deskripsi='" . $xdeskripsi . "'" .
                ",image='" . $ximage . "'" .
                "WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeletekategori($xidx) {
        $xStr = " DELETE FROM kategori WHERE kategori.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeletekategori($xidx);
    }

    function setInsertLogDeletekategori($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'kategori',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
