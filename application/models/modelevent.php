<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : event
 * di Buat oleh Diar PHP Generator */

class modelevent extends CI_Model {

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

    function getListevent($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "
                Where idx like '%" . $xSearch . "%' or title_ind like '%" . $xSearch . "%' or title_eng like '%" . $xSearch . "%'
            ";
        }
        $xStr = "SELECT * FROM event $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailevent($xidx) {
        $xStr = "SELECT * FROM event  WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertProduk($xtitleindo, $xtitleeng, $xdescindo, $xdesceng, $ximage, $xbackground) {
        $xStr = " INSERT INTO in_product_type ( name,ind_title,eng_title,ind_description,eng_description,image,bg_image ) 
                VALUES('" . $xtitleindo . "','" . $xtitleeng . "','" . $xdescindo . "','" . $xdesceng . "','" . $ximage . "','" . $xbackground . "')";
        $query = $this->db->query($xStr);
        $insert_id = $this->db->insert_id();
        return $insert_id;
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
