<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : bahasa
 * di Buat oleh Diar PHP Generator */

class model_language extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }

    function getBahasa($site_lang) { 
        if ($site_lang) {
            $this->lang->load('login', 'indonesian');
            $this->lang->load('message',$ci->session->userdata('site_lang'));
        } else {
            $this->lang->load('message','english');
        }
        $sess_data['title'] = $this->lang->line('title');
        $sess_data['username'] = $this->lang->line('username');
        $sess_data['password'] = $this->lang->line('password');
        $sess_data['rememberme'] = $this->lang->line('rememberme');
        $sess_data['loginbutton'] = $this->lang->line('loginbutton');
        return $sess_data;
    }


    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('site_lang');
        if ($site_lang) {
            $ci->lang->load('message',$ci->session->userdata('site_lang'));
        } else {
            $ci->lang->load('message','english');
        }
    }
}
