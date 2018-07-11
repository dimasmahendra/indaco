<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : About
 * di Buat oleh Diar PHP Generator */

class modelabout extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getDetailabout() {
        $xStr = " SELECT * FROM about ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertabout($xdescriptionindonesia, $xdescriptionenglish) {
        $xStr = " INSERT INTO about( isi_indo,isi_eng ) VALUES('" . $xdescriptionindonesia . "','" . $xdescriptionenglish . "')";
        $query = $this->db->query($xStr);
        return $query;
    }

    Function setUpdateabout($xidx, $xdescriptionindonesia, $xdescriptionenglish) {
        $xStr = " UPDATE about SET " .
                "isi_indo='" . $xdescriptionindonesia . "'" .
                ",isi_eng='" . $xdescriptionenglish . "'" .
                " WHERE id = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }
}
