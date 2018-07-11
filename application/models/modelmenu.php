<?php

if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');
/* Class  Model : menu
 * di Buat oleh Diar PHP Generator
 * Update List untuk grid karena program generatorku lom sempurna ya hehehehehe */

class modelmenu extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getArrayListmenu() { /* spertinya perlu lock table */
        $xBuffResul = array();
        $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform" .
                " FROM menu   order by urut ASC ";
        $query = $this->db->query($xStr);
        foreach ($query->result() as $row) {
            $xBuffResul[$row->idmenu] = $row->nmmenu;
        }
        return $xBuffResul;
    }

    function getListmenu($xAwal, $xLimit, $xSearch='') {
        if (!empty($xSearch)) {
            $xSearch = "Where nmmenu like '%" . $xSearch . "%'";
        }
        $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform" .
                " FROM menu $xSearch order by urut DESC limit " . $xAwal . "," . $xLimit;
        $query = $this->db->query($xStr);
        return $query;
    }

    function getDetailmenu($xidmenu) {
        $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform" .
                " FROM menu  WHERE idmenu = '" . $xidmenu . "'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }
    function getDetailmenubyurl($xurlmenu) {
        $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform" .
                " FROM menu  WHERE REPLACE(nmmenu,' ','-') like '%" . $xurlmenu . "%'";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getLastIndexmenu() { /* spertinya perlu lock table */
        $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform" .
                " FROM menu order by idmenu DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }
    function getDetailmenubyparent($xidmenu) {
        $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform" .
                " FROM menu  WHERE parentmenu = '" . $xidmenu . "' ";

        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    function getlistmenubyparent($xidparent,$view='') {
        if (!empty($view)) $view =  " AND idkomponen= '".$view."' ";
        $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform" .
                " FROM menu  WHERE parentmenu = '" . $xidparent . "' $view order by urut ASC";
        $query = $this->db->query($xStr);
        //echo $xStr;
        return $query;
    }
function getListmenux(){

 $xStr =   "SELECT ".
      "idmenu,".
      "nmmenu,".
      "tipemenu,".
      "idkomponen,".
      "iduser,".
      "parentmenu,".
      "urlci,jmlgambar,settingform".
      " FROM menu order by urut ASC";
 $query = $this->db->query($xStr);
 return $query ;
}
//    function getlistjenispemeriksaaanbyparent($xidparent,$xjnspenunjang) {
//        $xStr = "SELECT " .
//                "idx," .
//                "NamaPemerikasaan," .
//                "Keterangan," .
//                "idparent," .
//                "idjenispenunjang," .
//                "harga,urut" .
//                " FROM jenispemeriksaaan  WHERE idparent = '" . $xidparent . "' and idjenispenunjang = '".$xjnspenunjang."' order by urut ";
//
//        $query = $this->db->query($xStr);
//
//        return $query;
//    }

    Function setInsertmenu($xidmenu, $xnmmenu, $xtipemenu, $xidkomponen, $xiduser, $xparentmenu, $xurlci, $xurut, $xjmlgambar,$xsettingform) {
        $xStr = " INSERT INTO menu( " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar,settingform) VALUES('" . $xidmenu . "','" . $xnmmenu . "','" .
                $xtipemenu . "','" . $xidkomponen . "','" . $xiduser . "','" .
                $xparentmenu . "','" . $xurlci . "','" . $xurut . "','" . $xjmlgambar . "','".$xsettingform."')";
        $query = $this->db->query($xStr);
        return $xidmenu;
    }

    Function setUpdatemenu($xidmenu, $xnmmenu, $xtipemenu, $xidkomponen, $xiduser, $xparentmenu, $xurlci, $xurut, $xjmlgambar,$xsettingform) {
        $xStr = " UPDATE menu SET " .
                "idmenu='" . $xidmenu . "'," .
                "nmmenu='" . $xnmmenu . "'," .
                "tipemenu='" . $xtipemenu . "'," .
                "idkomponen='" . $xidkomponen . "'," .
                "iduser='" . $xiduser . "'," .
                "parentmenu='" . $xparentmenu . "'," .
                "urlci='" . $xurlci . "'," .
                "urut='" . $xurut . "'," .
                "settingform = '".$xsettingform."',".
                "jmlgambar='" . $xjmlgambar . "' WHERE idmenu = '" . $xidmenu . "'";
        $query = $this->db->query($xStr);
        return $xidmenu;
    }

    function setDeletemenu($xidmenu) {
        $xStr = " DELETE FROM menu WHERE menu.idmenu = '" . $xidmenu . "'";

        $query = $this->db->query($xStr);
    }
//*** check menu ***/
 function GetChildMenuForTree($xQuery, $xIsView=false) {

        $xBufResult = "";
        if (!empty($xQuery)) {

            foreach ($xQuery->result() as $row) {
                $xRowUrl = $row->urlci;

                if (empty($xRowUrl)) {
                    $xRowUrl = 'admin/index/' . $row->idmenu;
                }
                if ($xIsView) {
                    $xChild = $this->GetChildMenuForTree($this->getlistmenubyparent($row->idmenu), $xIsView);
                    $xBufResult .= setlionclick('SetHtmlList(' . $row->idmenu . ');', $row->nmmenu, $xChild);
                } else {
                    $xChild = $this->GetChildMenuForTree($this->getlistmenubyparent($row->idmenu));
                    $xBufResult .= setlitreechk($row->idmenu, $row->nmmenu, $xChild);
                }

                //$xChild  = $this->GetChild($this->getListmenu('2',$row->idmenu));
                // $xBufResult .= setli(site_url($xRowUrl),$row->nmmenu,$xChild);
            }

            if (!empty($xBufResult))
                $xBufResult = setultree('', $xBufResult);
        }
        return $xBufResult;
    }

    function getMenuForTree($xIsView=false) {
        $xBufResult = "";
        $this->load->helper('menu');
        $this->load->helper('url');

        $xQuery = $this->getlistmenubyparent('0');
        foreach ($xQuery->result() as $row) {

            $xRowUrl = $row->urlci;
            if ($row->iduser == '0') {
                if (empty($xRowUrl)) {
                    $xRowUrl = 'admin/index/' . $row->idmenu;
                }
            }

            if ($xIsView) {
                $xChild = $this->GetChildMenuForTree($this->getlistmenubyparent($row->idmenu), $xIsView);
                $xBufResult .= setlionclick('SetHtmlList(' . $row->idmenu . ');', $row->nmmenu, $xChild);
            } else {
                $xChild = $this->GetChildMenuForTree($this->getlistmenubyparent($row->idmenu));
                $xBufResult .= setlitreechk($row->idmenu, $row->nmmenu, $xChild);
            }
        }
        //$xBufResult = setul('menuatas',$xBufResult);
        $xBufResult = setultree('', $xBufResult);

        return $xBufResult;
    }

    //*** Menu Admn ***//
        function isinusermenu($xidmenu) {
            if (!$this->session->userdata('usergroup')) $iduser = "iduser = '" . 3 . "' ";
            else $iduser = "iduser = '" . $this->session->userdata('usergroup'). "' ";
        $xStr = "SELECT " .
                "idx," .
                "iduser," .
                "idmenu" .
                " FROM usermenu  WHERE ". $iduser . " and idmenu = '" . $xidmenu . "'";
        //echo $xStr;
        $query = $this->db->query($xStr);
        $row = $query->row();
        return!empty($row);
    }


    function GetChild($xQuery,$komponen) {

        $xBufResult = "";
        if (!empty($xQuery)) {

            foreach ($xQuery->result() as $row) {

                $xRowUrl = $row->urlci;

                if (empty($xRowUrl)) {
                    $xRowUrl = 'ctrcontent/index/'.$row->idmenu;
                }

                    $xChild = $this->GetChild($this->getlistmenubyparent($row->idmenu,$komponen),$komponen);

                    if ($this->isinusermenu($row->idmenu))
                        $xBufResult .= setli(site_url($xRowUrl), $row->nmmenu, $xChild);

            }

            if (!empty($xBufResult))
                $xBufResult = setultree(' class="nav nav-second-level" ', $xBufResult);
        }
        return $xBufResult;
    }



    function getMenuAtas($xIsView=false) {
        $xBufResult = "";
        $this->load->helper('menu');
        $this->load->helper('url');
        
        if ($xIsView == true) $komponen = 1;
        else $komponen=2;
        $xQuery = $this->getlistmenubyparent("0",$komponen);
        //print_r($xQuery);
        $xbutton = '';
        foreach ($xQuery->result() as $row) {
            $xRowUrl = $row->urlci;
            //if ($row->iduser == '0') {
                if (empty($xRowUrl)) {

                    $xRowUrl = '#';

                }
           // } 
                $quaery = $this->getlistmenubyparent($row->idmenu,$komponen);
                $cekchild = $quaery->result();
//                var_dump($cekchild->result());
                $xChild = $this->GetChild($this->getlistmenubyparent($row->idmenu,$komponen),$komponen);
                if ($komponen==2 && $this->isinusermenu($row->idmenu)){

                    if(!empty($cekchild)){
                        $xbutton = '<span class="fa arrow"></span>';
                    }
                    $xBufResult .= setli(site_url($xRowUrl),$row->nmmenu.$xbutton, $xChild);
                }else{
                    $xBufResult .= setli(site_url($xRowUrl), $row->nmmenu, $xChild);
                }
                
        }
        if (!empty($xBufResult))
        $xBufResult = setultree(' id="side-menu" class="nav"', $xBufResult);
        return $xBufResult;
    }

  function getMenuView(){
   $xStr = "SELECT " .
                "idmenu," .
                "nmmenu," .
                "tipemenu," .
                "idkomponen," .
                "iduser," .
                "parentmenu," .
                "urlci," .
                "urut," .
                "jmlgambar" .
                " FROM menu WHERE idkomponen = '1' order by urut ASC";
   
       $query = $this->db->query($xStr);
       
       return $query;

  }

}

?>