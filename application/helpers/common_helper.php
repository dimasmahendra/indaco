<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//class common extends helpers {
//      function common(){
//       parent::helpers();
//      }
//
//function datetomysql($xtgl) {
//    $array = explode('-', $xtgl);
//    return $array[2] . '-' . $array[1] . '-' . $array[0];
//}
function datetomysql($xtgl) {
    $time = strtotime($xtgl);
    $newformat = date('Y-m-d',$time);
    return $newformat;
    /*if (!empty($xtgl)) {
        $array = explode('-', $xtgl);
        if(!empty($array[2])){
          return $array[2] . '-' . $array[1] . '-' . $array[0];
        }else{
          return '';  
        }
    } 
    else {
        return '';
    }*/
}
    
function mysqltodate($xtgl) {
    $array = explode('-', $xtgl);
    return $array[2] . '-' . $array[1] . '-' . $array[0];
}

function getArrayObj($xNamaObject, $xValue, $xWidth, $rows = 0, $cols = 0) {
    $data = array(
        'name' => $xNamaObject,
        'id' => $xNamaObject,
        'value' => $xValue,
        'style' => 'width:' . $xWidth . 'px;',
        'rows' => $rows,
        'cols' => $cols
    );

    return $data;
}

function getArrayObjv2($xNamaObject, $xValue, $xWidth, $rows = 0, $cols = 0) {
    $data = array(
        'name' => $xNamaObject,
        'id' => $xNamaObject,
        'value' => $xValue,
        'style' => 'width:' . $xWidth . '%;',
        'rows' => $rows,
        'cols' => $cols
    );

    return $data;
}

function getArrayObjCheckBox($xNamaObject, $xValue, $ischecked, $xWidth, $rows = 0, $cols = 0) {
    $data = array(
        'name' => $xNamaObject,
        'id' => $xNamaObject,
        'value' => $xValue,
        'class' => 'chk form-check-input',
        'style' => 'width:' . $xWidth . 'px;margin:5px;',
        'checked' => set_checkbox($xNamaObject, $xValue, $ischecked)
    );

    return $data;
}

function getArrayBulan() {
    $xBuffResul['01'] = 'Januari';
    $xBuffResul['02'] = 'Februari';
    $xBuffResul['03'] = 'Maret';
    $xBuffResul['04'] = 'April';
    $xBuffResul['05'] = 'Mei';
    $xBuffResul['06'] = 'Juni';
    $xBuffResul['07'] = 'Juli';
    $xBuffResul['08'] = 'Agustus';
    $xBuffResul['09'] = 'September';
    $xBuffResul['10'] = 'Oktober';
    $xBuffResul['11'] = 'November';
    $xBuffResul['12'] = 'Desember';
    return $xBuffResul;
}

function getArrayHari() {
    $xBuffResul['1'] = 'Minggu';
    $xBuffResul['2'] = 'Senin';
    $xBuffResul['3'] = 'Selasa';
    $xBuffResul['4'] = 'Rabu';
    $xBuffResul['5'] = 'Kamis';
    $xBuffResul['6'] = 'Jumat';
    $xBuffResul['7'] = 'Sabtu';

    return $xBuffResul;
}

function getkeputusan() {
    $xBuffResul['0'] = '-';
    $xBuffResul['Y'] = 'DITERIMA';
    $xBuffResul['N'] = 'GAGAL';
    return $xBuffResul;
}

function getjenistagihan() {
    $xBuffResul['0'] = '-';
    $xBuffResul['1'] = 'Semua Siswa';
    $xBuffResul['2'] = 'Perkelas';
    $xBuffResul['3'] = 'Persiswa';
    $xBuffResul['4'] = 'Semua Calon Siswa';
    $xBuffResul['5'] = 'Per Calon Siswa';
    return $xBuffResul;
}

function getArrayYaTidak() {
    $xBuffResul[''] = '-';
    $xBuffResul['Y'] = 'YA';
    $xBuffResul['N'] = 'TIDAK';
    return $xBuffResul;
}

function SetTglToIndo($xTgl) {
    $xArray = explode('-', $xTgl);
    $xTahun = $xArray[0];
    $xBulan = $xArray[1];
    $xHari = $xArray[2];
    $xArrBulan = getArrayBulan();

    return $xHari . '&nbsp;' . $xArrBulan[$xBulan] . '&nbsp;' . $xTahun;
}

function setForm($xName, $xCaption, $xForm, $xAtrib = '',$class='') {
    if(!empty($xCaption)){
        $label = '<label class="hidden-xs" for="' . $xName . '">' . $xCaption . '<span class="small">' . $xAtrib . '</span>' . '</label> ';
    }else $label = $xName;
    $xBufResult = '<div ' .$class. ' class="form-group input-group " >  '.$label. $xForm . '</div>';
    return $xBufResult;
}

function setForm2($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult =  '<div '.$xAtrib.'><label class="col-md-2" for="' . $xName . '">'.$xCaption . '</label> ' . $xForm .'</div>';
    return $xBufResult;
}

function setFormNF($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult = '<dl> <dt> <label for="' . $xName . '">' . $xCaption . '</label></dt> <dd>' . $xForm . '</dd> </dl> ';
    return $xBufResult;
}

function setNFRadio($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult = $xForm . ' <label for="' . $xName . '" class ="opt">' . $xCaption . '</label>  ';
    return $xBufResult;
}

function setFormNFRadio($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult = '<dl> <dt> <label for="' . $xName . '" >' . $xCaption . '</label></dt>  <dd> ' . $xForm . '</dd></dl> ';
    return $xBufResult;
}

function setFormNoP($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult = '<label for="' . $xName . '">' . $xCaption . '<span class="small">' . $xAtrib . '</span>' . '</label> ' . $xForm . '';
    return $xBufResult;
}

function setFormChechList($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult = '<p>' . $xForm . '<div id=check> <label for="' . $xName . '">' . $xCaption . '<span class="small">' . $xAtrib . '</span>' . '</label></div> </p>';
    return $xBufResult;
}

function setFormChechList2($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult = '<p style="margin-left:145px;">' . $xForm . '<div id=check> <label for="' . $xName . '" >' . $xCaption . '<span class="small">' . $xAtrib . '</span>' . '</label></div> </p>';
    return $xBufResult;
}

function setFormChechList3($xName, $xCaption, $xForm, $xAtrib = '') {
    $xBufResult = '<p>' . $xForm . '<div id=check> <label for="' . $xName . '" style="width:390px;">' . $xCaption . '<span class="small">' . $xAtrib . '</span>' . '</label></div> </p>';
    return $xBufResult;
}

function addRow($Cells, $xisheader = false) {
    //  return '<span class="row">'.$Cells.'</div>';
    //return $Cells;
    $xClassCell = '';
    if ($xisheader == true) {
        $xClassCell = 'class="rowsreportheader"';
    } else {
        $xClassCell = 'class="rowsreporttabledata"';
    }
    return '<div ' . $xClassCell . '>' . $Cells . '</div>';
}

function addCell($xContent, $xStyle, $xisheader = false) {
    //width: 150px;
    $xClassCell = '';
    if ($xisheader == true) {
        $xClassCell = 'class="headertabledata"';
    } else {
        $xClassCell = 'class="detailtabledata"';
    }

//    return   '<div class="'.$xClassCell.'" style="'.$xStyle.'">'.$xContent.'</div>';
    return '<div ' . $xClassCell . ' style="' . $xStyle . '"><div style="padding:2px; width:100%; height:100%;">' . $xContent . '</div></div>';
}

function tbaddrow($cells, $style = '', $ishead = false) {
    if ($ishead) {
        return '<tr class="border head padded" style="' . $style . '">' . $cells . '</tr>';
    } else {
        return '<tr class="border" style="' . $style . '">' . $cells . '</tr>';
    }
}

function tbaddcell($xContent, $xStyle = "", $propother = "") {
    return '<td ' . $propother . ' style="' . $xStyle . '">' . $xContent . '</td>';
}
function tbaddcellhead($xContent, $xStyle = "", $propother = "") {
    return '<th ' . $propother . ' style="' . $xStyle . '">' . $xContent . '</th>';
}

function tablegrid($xContent, $xStyle = "", $propother = "") {
    return '<table ' . $propother . ' class="table table-striped table-hover fixed-table-container table-no-bordered" width="100%" cellspacing="0" cellpadding="0" class="tableborder" style="' . $xStyle . '">' . $xContent . '</table>';
}

function tablegridnobroder($xContent, $xStyle = "", $propother = "") {
    return '<table ' . $propother . ' width="100%" cellspacing="0" cellpadding="0"  style="' . $xStyle . '">' . $xContent . '</table>';
}

function addCellDiv($xContent, $xStyle, $xClassCell = '', $xisheader = false) {
    //width: 150px;
    ;
    if ($xisheader == true)
        $xClassCell = 'class="header"';
    return '<div ' . $xClassCell . ' style="' . $xStyle . '">' . $xContent . '</div>';
}

function addRowDiv($Cells) {
    return '<div class="rowsreport">' . $Cells . '</div>';
    //return $Cells;
}

function addRowDivDetail($Cells) {
    return '<div class="rowsreportdetail">' . $Cells . '</div>';
    //return $Cells;
}

function GetGrid($xRowsCells, $xWidth, $xHeight) {
    //return   '<div id="tabledata" name ="tabledata" class="tc1" style="width:'.$xWidth.'px;height:'.$xHeight.'px;">'.$xRowsCells.'<div style="clear:both;"></div></div>';
    return $xRowsCells;
}

function addJS($xUrl) {
    //alert("http://<?php echo base_url();index.php?/csearch/setviewsearch/"+document.getElementById('edSearch').value+"/0");
    //csearch/setviewsearch/"+document.getElementById("edSearch").value+"/0"
    $xBufResult = '';
    $xBufResult .= ' <script type="text/javascript">' .
            '   function edit(idrec){' .
            '     document.location="index.php?/' . $xUrl . '/"+idrec+"/edit";' .
            '    }' .
            '   function search(idrec){' .
            ' if(document.getElementById(\'edSearch\').value!=""){' .
            '     document.location="index.php?/' . $xUrl . '/"+document.getElementById(\'edSearch\').value+"/search";' .
            '    }' .
            '    }' .
            '   function hapus(idrec,ket){' .
            ' if (confirm("Anda yakin Akan menghapus data "+ket+"?")) {' .
            '      document.location="index.php?/' . $xUrl . '/"+idrec+"/hapus";' .
            '     }' .
            '  }' .
            '</script>     ';
    return $xBufResult;
}

function getListItem($xArray) {
    $xBufResult = '';
    for ($i = 1; $i < count($xArray); $i++) {
        $xBufResult .= $xArray[$i];
    }

    return $xBufResult;
}

function setview($xArrayObject) {
    $Menu = $xArrayObject[0];
    $xContent = $xArrayObject[2];
    return ' <div id="container">' .
            '           <div id="menu">
                ' . $Menu . '
                </div>

                <div id="content">
                   ' . $xContent . '
                </div>

            <div id="footer"> </div>' .
            '</div>';
}

function setviewadmin($xArrayObject) {
    //$Menu = $xArrayObject[0];
    $MenuAdmin = $xArrayObject[1];
    $xContent = $xArrayObject[2];
    $xlogo = $xArrayObject[3];
    $xnama = $xArrayObject[4];
    $xjudul = (!empty($xArrayObject[5]))?'<div class="panel-heading"><h4>'.$xArrayObject[5].'</h4></div>':'';
    $xadmintitle = $xArrayObject[6];
    if (!empty($xArrayObject[1]))
        return '  <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="'. base_url().'index.php/webadmindo"><img src="'.$xlogo.'" /></a>
            </div>
            <!-- /.navbar-header -->
             <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="' . base_url() . 'index.php/webadmindo/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                  </ul>
            <!-- /.navbar-top-links -->
                <!-- /.dropdown -->
                 <div class="sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    '.$MenuAdmin.'
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">'.$xadmintitle.'</h1>
                            <div class="alert alert-info">
                             <strong>Welcome '.strtoupper($xnama).' ! </strong> You Have No pending Task For Today.
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
               
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        '.$xjudul.'
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <div id="content-content">
                                     ' . $xContent . '

                                     </div>
                                       </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel --> 
                    </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
        <div id="loading" class="loading"><img class="loading-image center-block" src='.base_url().'resource/scriptmedia/images/loading.gif /></div>
';
    else
        return '
                ' . $xContent . '

              ';
//<div id="footer"><div id="myslidemenu"  class="jqmenuatas">' . $MenuAdmin[1] . '</div> </div>' .
    
}

?>