<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : event
 * di Buat oleh Diar PHP Generator */

class modelinspirasi extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    Function insertInInspirasi($post) {
        parse_str($post['forms'], $output);
        $insert = array(
            'name' => $output['name']
        );
        if($this->session->userdata('update_id') != ''){
            $this->db->where('id', $output['inspirasi_id']);
            $update = $this->db->update('in_inspirasi', $insert);
            if ($update == '1')
            {
                return $output['inspirasi_id'];
            } 
            else 
            {
                echo "salah";
            }
        }
        else {
            $this->db->insert('in_inspirasi', $insert);           
            if ($this->db->affected_rows() > 0) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }
}
