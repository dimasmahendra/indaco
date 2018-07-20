<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : event
 * di Buat oleh Diar PHP Generator */

class modelproduk extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    Function insertInProduct($post) {
        parse_str($post['forms'], $output);
        $feature = json_encode(explode(',', $post['feature']), JSON_FORCE_OBJECT);
        $insert = array(
            'type_id' => $output['typeOptionsSelected'],
            'type_title' => $output['type_title'],
            'name' => $output['name'],
            'ind_description' => $output['ind_description'],
            'eng_description' => $output['eng_description'],
            'features_id' => $feature,
            'image' => $output['prodimg']
        );
        if($this->session->userdata('update_id') != ''){
            $this->db->where('id', $output['product_id']);
            $update = $this->db->update('in_products', $insert);
            if ($update == '1')
            {
                return $output['product_id'];
            } 
            else 
            {
                return FALSE;
            }
        }
        else {
            $this->db->insert('in_products', $insert);           
            if ($this->db->affected_rows() > 0) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }
}
