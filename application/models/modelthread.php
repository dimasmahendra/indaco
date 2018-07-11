<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : event
 * di Buat oleh Diar PHP Generator */

class modelthread extends CI_Model {

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

    function getthreadselected($xidx) { 
        $xStr = "SELECT b.idx 
                FROM thread_event a
                JOIN event b
                WHERE a.thread_id = '" . $xidx . "' AND a.event_id = b.idx";
        $query = $this->db->query($xStr);
        $row = $query->result_array();
        foreach ($row as $key => $value) {
            $idselected[] = $value['idx'];
        }
        return $idselected;
    }

    function getListthread($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "
                Where idx like '%" . $xSearch . "%' or title_ind like '%" . $xSearch . "%' or title_eng like '%" . $xSearch . "%'
            ";
        }
        $xStr = "SELECT * FROM thread $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getAllListEvent() {
        $xStr = "SELECT * FROM event";
        $query = $this->db->query($xStr);
        $row = $query->result_array();
        return $row;
    }

    function getDetailThread($xidx) {
        $xStr = "SELECT * FROM thread  WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertevent($xtitleindo, $xtitleeng, $xdescindo, $xdesceng, $xtanggal) {
        $xStr = " INSERT INTO thread ( title_ind,title_eng,content_ind,content_eng,tanggal ) 
                VALUES('" . $xtitleindo . "','" . $xtitleeng . "','" . $xdescindo . "','" . $xdesceng . "','" . $xtanggal . "')";
        $query = $this->db->query($xStr);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    Function setInsertThreadEvent($xStr,$xevent) {
        $xStr = " INSERT INTO thread_event ( thread_id,event_id ) 
                VALUES('" . $xStr . "','" . $xevent . "')";
        $query = $this->db->query($xStr);
        return $query;
    }

    Function setUpdatethread($xidx, $xtitleindo, $xtitleeng, $xdescindo, $xdesceng, $xtanggal) {
        $xStr = " UPDATE thread SET " .
                "title_ind='" . $xtitleindo . "'" .
                ",title_eng='" . $xtitleeng . "'" .
                ",content_ind='" . $xdescindo . "'" .
                ",content_eng='" . $xdesceng . "'" .
                ",tanggal='" . $xtanggal . "'" .
                " WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $query;
    }

    function setDeleteThreadEvent($xidx) {
        $table = "thread_event";
        $xStr = " DELETE FROM $table WHERE thread_id = '" . $xidx . "'";
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
