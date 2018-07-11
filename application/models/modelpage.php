<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : page
 * di Buat oleh Diar PHP Generator */

class modelpage extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListpage() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",title" .
                ",description" .
                ",date" .
                ",image" .
                ",istampil" .
                ",keyword" .
                ",idmetatag" .
                ",idkategoripage" .
                ",idbahasa" .
                ",idimage" .
                ",`update`" .
                ",iduser" .
                " FROM page   order by idx ASC ";
        $query = $this->db->query($xStr);
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->idx;
        }
        return $xBuffResul;
    }

    function getListpage($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "Where idx like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",title" .
                ",description" .
                ",date" .
                ",image" .
                ",istampil" .
                ",keyword" .
                ",idmetatag" .
                ",idkategoripage" .
                ",idbahasa" .
                ",idimage" .
                ",`update`" .
                ",iduser" .
                " FROM page $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailpage($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",title" .
                ",description" .
                ",date" .
                ",image" .
                ",istampil" .
                ",keyword" .
                ",idmetatag" .
                ",idkategoripage" .
                ",idbahasa" .
                ",idimage" .
                ",`update`" .
                ",iduser" .
                " FROM page  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexpage() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",title" .
                ",description" .
                ",date" .
                ",image" .
                ",istampil" .
                ",keyword" .
                ",idmetatag" .
                ",idkategoripage" .
                ",idbahasa" .
                ",idimage" .
                ",`update`" .
                ",iduser" .
                " FROM page order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertpage($xidx, $xtitle, $xdescription, $xdate, $ximage, $xistampil, $xkeyword, $xidmetatag, $xidkategoripage, $xidbahasa, $xidimage, $xupdate, $xiduser) {
        $xStr = " INSERT INTO page( " .
                "idx" .
                ",title" .
                ",description" .
                ",date" .
                ",image" .
                ",istampil" .
                ",keyword" .
                ",idmetatag" .
                ",idkategoripage" .
                ",idbahasa" .
                ",idimage" .
                ",`update`" .
                ",iduser" .
                ") VALUES('" . $xidx . "','" . $xtitle . "','" . $xdescription . "','" . $xdate . "','" . $ximage . "','" . $xistampil . "','" . $xkeyword . "','" . $xidmetatag . "','" . $xidkategoripage . "','" . $xidbahasa . "','" . $xidimage . "',now(),'" . $xiduser . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdatepage($xidx, $xtitle, $xdescription, $xdate, $ximage, $xistampil, $xkeyword, $xidmetatag, $xidkategoripage, $xidbahasa, $xidimage, $xupdate, $xiduser) {
        $xStr = " UPDATE page SET " .
                "idx='" . $xidx . "'" .
                ",title='" . $xtitle . "'" .
                ",description='" . $xdescription . "'" .
                ",date='" . $xdate . "'" .
                ",image='" . $ximage . "'" .
                ",istampil='" . $xistampil . "'" .
                ",keyword='" . $xkeyword . "'" .
                ",idmetatag='" . $xidmetatag . "'" .
                ",idkategoripage='" . $xidkategoripage . "'" .
                ",idbahasa='" . $xidbahasa . "'" .
                ",idimage='" . $xidimage . "'" .
                ",`update`=now()" .
                ",iduser='" . $xiduser . "'" .
                " WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeletepage($xidx) {
        $xStr = " DELETE FROM page WHERE page.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeletepage($xidx);
    }

    function setInsertLogDeletepage($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'page',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
