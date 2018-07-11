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

    function getArrayKomponen($isFromAdmin, $xContent = '',$judul='') {
        $session_data = $this->session->userdata('lang');
        $xBuffResult = array();
        $this->load->model('modelmenu');
        //if true menu tampil di halalaman depan
        $xUser = $this->session->userdata('nama');
        $menuatas = '';
        if (!empty($xUser)) {
            $menuatas = $this->modelmenu->getMenuAtas();
        }
        
        $xBuffResult[1] = $menuatas;
        $xBuffResult[2] = $xContent;
        $xBuffResult[3] = "" . base_url() . "resource/indaco/img/indaco.png";

        $xBuffResult[4] = $this->session->userdata('nama');
        $xBuffResult[5] = (!empty($judul)?$judul:'');
        $xBuffResult[6] = $this->lang->line('admintitle');
        $xBuffResult[7] = "";

        return $xBuffResult;
    }

    function SetViewAdmin($xContent, $xList, $buf1, $xAjax, $buf2,$judul='') {

        $this->load->helper('common');
        $this->load->helper('html');
        $xBufResult = $xContent . $xList;

        if (strpos($xContent, '<form') > 0) {
            $xBufResult = $xContent . '</form></div> ' . $xList;
        }
        $xMenuKanan = '';
        $xShow = setviewadmin($this->getArrayKomponen(TRUE, $xBufResult,$judul));
        $xecho = '<!doctype html>
              <html xmlns="http://www.w3.org/1999/xhtml">
              <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <title>Halaman Admin</title>
              <script type="text/javascript">
                 function getBaseURL() {
                          return "' . base_url() . '";
                        } 
                </script>
                    ' . "\n" .
                link_tag('resource/js/jquery/themes/base/jquery-ui.css') . "\n" .
                link_tag('resource/admin/vendor/bootstrap/css/bootstrap.min.css') . "\n" .
                link_tag('resource/admin/vendor/metisMenu/metisMenu.min.css') . "\n" .
                 link_tag('resource/admin/vendor/bootstrap-table/bootstrap-table.css') . "\n" .
//                link_tag('resource/admin/vendor/datatables-plugins/dataTables.bootstrap.css') . "\n" .
                link_tag('resource/admin/dist/css/sb-admin-2.css') . "\n" .
                link_tag('resource/admin/dist/css/style.css') . "\n" .
                link_tag('resource/admin/vendor/font-awesome/css/font-awesome.min.css') . "\n" .
//                '<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/admin/vendor/jquery/jquery.min.js"></script>' . "\n" .
                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/jquery/ui/jquery-ui.min.js"></script>' . "\n" .
//                '<script language="javascript" type="text/javascript" src="' . base_url() . 'resource/js/common/jqmenuatas.js"></script> ' . "\n" .
                $xAjax . "\n" .
                '<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
                   </head>
                   <body>' .
                $xShow .
//                '  <script src="'.base_url().'resource/admin/js/jquery-1.10.2.js"></script>'.
//                '     <script src="'.base_url().'resource/admin/vendor/jquery/jquery.min.js"></script>'.
                '<script src="' . base_url() . 'resource/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="' . base_url() . 'resource/admin/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="' . base_url() . 'resource/admin/dist/js/sb-admin-2.js"></script>'
                .'<!-- DataTables JavaScript -->
   './* <script src="' . base_url() . 'resource/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="' . base_url() . 'resource/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="' . base_url() . 'resource/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>'
    */''     ./*<script>
    $(document).ready(function() {
        $(".dataTable ").DataTable({
            responsive: false
        });
    });
    </script>'*/''
                . '</body>' .
                '  </html>';

        return $xecho;
    }

}

?>
