<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LanguageLoader
{
	var $CI;

    function __construct(){
        $this->CI =& get_instance();
    }
	
    function initialize() {
        $this->CI->load->helper('language');
        $this->CI->load->library('session');

        if (!$this->CI->session->userdata('lang')) {
        	$this->CI->lang->load("login", 'indonesian');
        }
		else if ($this->CI->session->userdata('lang') == 'id') {
			$this->CI->lang->load("login", 'indonesian');
		} 
		else if ($this->CI->session->userdata('lang') == 'en') {
			$this->CI->lang->load("login", 'english');
		}
    }
}