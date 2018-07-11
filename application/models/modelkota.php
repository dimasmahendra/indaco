<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : kota
 * di Buat oleh Diar PHP Generator */

class modelkota extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListkota() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",kode_kota" .
                ",kota" .
                ",idprovinsi" .
                " FROM kota   order by idx ASC ";
        $query = $this->db->query($xStr);
        $xBuffResul[0] = '--kota--';
        foreach ($query->result() as $row) {
            $xBuffResul[$row->kode_kota] = $row->idx;
        }
        return $xBuffResul;
    }

    function getListkota($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "Where idx like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",kode_kota" .
                ",kota" .
                ",idprovinsi" .
                " FROM kota $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }
    function getListkotabyprovinsi($idprovinsi) {
        $xBuffResul = array();
        $xSearch ='';
        if (!empty($idprovinsi)) {
            $xSearch = "Where idprovinsi ='" . $idprovinsi . "'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",kode_kota" .
                ",kota" .
                ",idprovinsi" .
                " FROM kota $xSearch order by kota ASC";
        $query = $this->db->query($xStr);
        $xBuffResul[0] = '--kota--';
        
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->kota;
        }
        return $xBuffResul;
    }

    function getDetailkota($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",kode_kota" .
                ",kota" .
                ",idprovinsi" .
                " FROM kota  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexkota() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",kode_kota" .
                ",kota" .
                ",idprovinsi" .
                " FROM kota order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertkota($xidx, $xkode_kota, $xkota, $xidprovinsi) {
        $xStr = " INSERT INTO kota( " .
                "idx" .
                ",kode_kota" .
                ",kota" .
                ",idprovinsi" .
                ") VALUES('" . $xidx . "','" . $xkode_kota . "','" . $xkota . "','" . $xidprovinsi . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdatekota($xidx, $xkode_kota, $xkota, $xidprovinsi) {
        $xStr = " UPDATE kota SET " .
                "idx='" . $xidx . "'" .
                ",kode_kota='" . $xkode_kota . "'" .
                ",kota='" . $xkota . "'" .
                ",idprovinsi='" . $xidprovinsi . "'" .
                "WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeletekota($xidx) {
        $xStr = " DELETE FROM kota WHERE kota.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeletekota($xidx);
    }

    function setInsertLogDeletekota($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'kota',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
