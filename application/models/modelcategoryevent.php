<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : categoryevent
 * di Buat oleh Diar PHP Generator */

class modelcategoryevent extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListcategoryevent() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idx" . ",categoryevent" .
                ",description" .
                ",image" .
                ",slug" .
                ",idparent" .
                ",idbahasa" .
                " FROM categoryevent   order by idx ASC ";
        $query = $this->db->query($xStr);
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idx] = $row->idx;
        }
        return $xBuffResul;
    }

    function getListcategoryevent($xAwal, $xLimit, $xSearch = '') {
        if (!empty($xSearch)) {
            $xSearch = "Where idx like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",categoryevent" .
                ",description" .
                ",image" .
                ",slug" .
                ",idparent" .
                ",idbahasa" .
                " FROM categoryevent $xSearch order by idx DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }
    function getListcategoryeventbyparent($xSearch) {
        if (!empty($xSearch)) {
            $xSearch = "Where idparent ='" . $xSearch . "'";
        }
        $xStr = "SELECT " .
                "idx" .
                ",categoryevent" .
                ",description" .
                ",image" .
                ",slug" .
                ",idparent" .
                ",idbahasa" .
                " FROM categoryevent $xSearch order by categoryevent ASC";
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailcategoryevent($xidx) {
        $xStr = "SELECT " .
                "idx" .
                ",categoryevent" .
                ",description" .
                ",image" .
                ",slug" .
                ",idparent" .
                ",idbahasa" .
                " FROM categoryevent  WHERE idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexcategoryevent() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idx" .
                ",categoryevent" .
                ",description" .
                ",image" .
                ",slug" .
                ",idparent" .
                ",idbahasa" .
                " FROM categoryevent order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    Function setInsertcategoryevent($xidx, $xcategoryevent, $xdescription, $ximage, $xslug, $xidparent, $xidbahasa) {
        $xStr = " INSERT INTO categoryevent( " .
                "idx" .
                ",categoryevent" .
                ",description" .
                ",image" .
                ",slug" .
                ",idparent" .
                ",idbahasa" .
                ") VALUES('" . $xidx . "','" . $xcategoryevent . "','" . $xdescription . "','" . $ximage . "','" . $xslug . "','" . $xidparent . "','" . $xidbahasa . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    Function setUpdatecategoryevent($xidx, $xcategoryevent, $xdescription, $ximage, $xslug, $xidparent, $xidbahasa) {
        $xStr = " UPDATE categoryevent SET " .
                "idx='" . $xidx . "'" .
                ",categoryevent='" . $xcategoryevent . "'" .
                ",description='" . $xdescription . "'" .
                ",image='" . $ximage . "'" .
                ",slug='" . $xslug . "'" .
                ",idparent='" . $xidparent . "'" .
                ",idbahasa='" . $xidbahasa . "'" .
                "WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    function setDeletecategoryevent($xidx) {
        $xStr = " DELETE FROM categoryevent WHERE categoryevent.idx = '" . $xidx . "'";

        $query = $this->db->query($xStr);
        $this->setInsertLogDeletecategoryevent($xidx);
    }

    function setInsertLogDeletecategoryevent($xidx) {
        $xidpegawai = $this->session->userdata('idpegawai');
        $xStr = "insert into logdelrecord(idxhapus,nmtable,tgllog,ideksekusi) values($xidx,'categoryevent',now(),$xidpegawai)";
        $query = $this->db->query($xStr);
    }

}
