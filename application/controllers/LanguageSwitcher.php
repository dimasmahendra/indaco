<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LanguageSwitcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();     
    }

    public function index()
	{
        $this->code($language);
	}
 
    public function code($language)
	{
		$from = $_SERVER['HTTP_REFERER'];
		$language = ($language != "") ? $language : "id";
        $this->session->set_userdata('lang', $language);
        redirect($from);
	}
}