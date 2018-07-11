<?php

class modelgetmenu extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getNumberRandom() {
        $i = 0;
        $xbufrandom = '';
        while ($i <= 6) {
            $xbufrandom .= rand(10000, 99999);
            $i++;
        }
        return $xbufrandom;
    }

    function getArrayKomponen($isFromAdmin, $xContent='') {
        $xBuffResult = array();
        $this->load->model('modelmenu');

        $xBuffResult[1] = $this->modelmenu->getMenuAtas();
        $xBuffResult[2] = $xContent;
        $xBuffResult[3] = "".  base_url()."resource/imgbtn/logo.png";
        $xBuffResult[4] = "";
        $xBuffResult[5] = "";
        $xBuffResult[6] = "";
        $xBuffResult[7] = "";

        return $xBuffResult;
    }

    function SetViewAdmin($xContent, $xList, $buf1, $xAjax, $buf2) {

        $this->load->helper('common');
        $this->load->helper('html');
        $xBufResult = $xContent . $xList;
        if (strpos($xContent, '<form') > 0) {
            $xBufResult = $xContent . '</form></div> ' . $xList;
        }
        $xMenuKanan = '';
        $xShow = setviewadmin($this->getArrayKomponen(TRUE, $xBufResult));
        if (trim($buf1)=='login') $class=link_tag('resource/css/admin/pphi.css');
        else $class=link_tag('resource/css/admin/common.css'). "\n" . link_tag('resource/css/admin/frmlayout.css') . "\n";
        $xecho = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
              <Title>
              </Title>
              <head>
              <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
              <script type="text/javascript">
                 function getBaseURL() {
                          return "'.  base_url().'";
                        }
                </script>
                    ' . "\n" .
                link_tag('resource/js/jquery/themes/base/jquery-ui.css') . "\n" .
                 $class .
               link_tag('resource/css/admin/jqmenuatas.css') . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/jquery/jquery-1.9.1.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/jquery/ui/jquery-ui.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/jqmenuatas.js"></script> ' . "\n" .
                $xAjax ."\n" .
               '</head>'.
                '<body  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">' .
                $xShow .
                '  </body>' .
                '  </html>';

        return $xecho;
    }

}

?>
