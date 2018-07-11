<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : metatag
 * di Buat oleh Diar PHP Generator */

class modelmetatag extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListmetatag() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",metakey" .
                ",value" .
                ",idcontent" .
                " FROM metatag   order by idx ASC ";
        $query = $this->db->query($xStr);
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->idx;
        }
        return $xBuffResul;
    }
    function getlistmetatagauto($xSearch='') { /* spertinya perlu lock table */
        if (!empty($xSearch)) {
            $xSearch = " Where value like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" . ",metakey" .
                ",value" .
                ",idcontent" .
                " FROM metatag  $xSearch order by idx ASC ";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    function getListmetatag($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "Where idx like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",metakey" .
                ",value" .
                ",idcontent" .
                " FROM metatag $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailmetatag($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",metakey" .
                ",value" .
                ",idcontent" .
                " FROM metatag  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexmetatag() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",metakey" .
                ",value" .
                ",idcontent" .
                " FROM metatag order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertmetatag($xidx, $xmetakey, $xvalue, $xidcontent) {
        $xStr = " INSERT INTO metatag( " .
                "idx" .
                ",metakey" .
                ",value" .
                ",idcontent" .
                ") VALUES('" . $xidx . "','" . $xmetakey . "','" . $xvalue . "','" . $xidcontent . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdatemetatag($xidx, $xmetakey, $xvalue, $xidcontent) {
        $xStr = " UPDATE metatag SET " .
                "idx='" . $xidx . "'" .
                ",metakey='" . $xmetakey . "'" .
                ",value='" . $xvalue . "'" .
                ",idcontent='" . $xidcontent . "'" .
                "WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeletemetatag($xidx) {
        $xStr = " DELETE FROM metatag WHERE metatag.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeletemetatag($xidx);
    }

    function setInsertLogDeletemetatag($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'metatag',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
