<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : event
 * di Buat oleh Diar PHP Generator */

class modelproduk extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getEventArtist($xidx) { /* spertinya perlu lock table */
        $xStr = "SELECT b.name 
                FROM event_artist a
                JOIN artist b
                WHERE a.event_id = '" . $xidx . "' AND a.artist_id = b.idx";
        $query = $this->db->query($xStr);
        $row = $query->result_array();
        foreach ($row as $key => $value) {
            $name[] = $value['name'];
        }
        return $name;
    }

    function getartistselected($xidx) { /* spertinya perlu lock table */
        $xStr = "SELECT b.idx 
                FROM event_artist a
                JOIN artist b
                WHERE a.event_id = '" . $xidx . "' AND a.artist_id = b.idx";
        $query = $this->db->query($xStr);
        $row = $query->result_array();
        foreach ($row as $key => $value) {
            $idselected[] = $value['idx'];
        }
        return $idselected;
    }

    function getListProduk($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "
                Where id like '%" . $xSearch . "%' or ind_title like '%" . $xSearch . "%' or eng_title like '%" . $xSearch . "%'
            ";
        }
        $xStr = "SELECT * FROM in_product_type $xSearch order by id DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailevent($xidx) {
        $xStr = "SELECT * FROM event  WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertevent($xtitleindo, $xtitleeng, $xdescindo, $xdesceng, $xidkat, $xtanggal) {
        $xStr = " INSERT INTO event ( title_ind,title_eng,description_ind,description_eng,kategori,tanggal ) 
                VALUES('" . $xtitleindo . "','" . $xtitleeng . "','" . $xdescindo . "','" . $xdesceng . "','" . $xidkat . "','" . $xtanggal . "')";
        $query = $this->db->query($xStr);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    Function setInsertEventArtist($xStr,$xartis) {
        $xStr = " INSERT INTO event_artist ( event_id,artist_id ) 
                VALUES('" . $xStr . "','" . $xartis . "')";
        $query = $this->db->query($xStr);
        return $query;
    }

    Function setUpdateevent($xidx, $xtitleindo, $xtitleeng, $xdescindo, $xdesceng, $xidkat, $xtanggal) {
        $xStr = " UPDATE event SET " .
                "title_ind='" . $xtitleindo . "'" .
                ",title_eng='" . $xtitleeng . "'" .
                ",description_ind='" . $xdescindo . "'" .
                ",description_eng='" . $xdesceng . "'" .
                ",kategori='" . $xidkat . "'" .
                ",tanggal='" . $xtanggal . "'" .
                " WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $query;
    }

    function setDeleteeventartist($xidx) {
        $table = "event_artist";
        $xStr = " DELETE FROM $table WHERE event_id = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $this->setInsertLogDeleteevent($xidx, $table);
    }

    function setDeleteevent($xidx) {
        $table = "event";
        $xStr = " DELETE FROM event WHERE event.idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $this->setInsertLogDeleteevent($xidx, $table);
    }

    function setInsertLogDeleteevent($xidx, $table) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'$table',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
