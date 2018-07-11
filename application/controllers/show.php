<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctrview
 *
 * @author scriptmedia
 */
if (!defined('BASEPATH'))
    exit('Tidak Diperkenankan mengakses langsung');

class show extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('basemodel');
    }

    function index() {
//        $data['maincontent'] = $this->maincontent(215);
//        $data['sidebar']= $this->sidebar();
        $data['header'] = $this->basemodel->header();
//        $data['slider'] = $this->slider();
//        $data['footerwidget']= $this->footerwidget();
        $data['footer'] = $this->basemodel->footer();
//        $data['banner']= $this->showbanner(97);
        //$data['title'] = 'SMK Negeri 2 Simpang Empat';
        $this->load->view('scriptmedia/index', $data);
    }

    function listproperti() {
        $this->load->model('modelproduk');
        $this->load->model('basemodel');
        $this->load->model('modeltiperumah');
        $this->load->model('modeljenisproperti');
        $this->load->model('modelkondisi');
        $this->load->helper('form');
        $this->load->helper('json');
        $xAwal = $_POST['xAwal'];
        $xLimit = 10;
//        $xSearch = $_POST['xSearch'];
        $xluas = $_POST['edidluas'];
        $xharga = $_POST['edidharga'];
        $xidtipe = $_POST['edidtipe'];
//        $xidkepemilikan = $_POST['edidkepemilikan'];
//        $xidkelurahan = $_POST['edidkelurahan'];
        $xidkecamatan = $_POST['edidkecamatan'];
        $xidkabupaten = $_POST['edidkabupaten'];
//        $xidkota = $_POST['edidkota'];
//        $xidprovinsi = $_POST['edidprovinsi'];
        $xidjenisproperti = $_POST['edidjenisproperti'];
//        $xidsertifikat = $_POST['edidsertifikat'];
//        $xidkondisi = $_POST['edidkondisi'];
        $xshort= $_POST['edshort'];
        $urut = array(
            '0'=> 'Urut',
            '1'=> 'Luas A - Z',
            '2'=> 'Luas Z - A',
            '3'=> 'Tipe A - Z',
            '4'=> 'Tipe Z - A',
            '5'=> 'Harga A - Z',
            '6'=> 'Harga Z - A'
        );
         $listproperti = $this->modelproduk->getListprodukshow($xAwal, $xLimit, $xluas, $xharga, $xidtipe,  $xidkecamatan, $xidkabupaten, $xidjenisproperti,$xshort);
        $totalrow = $this->modelproduk->getListprodukshow(0, 1000000000, $xluas, $xharga, $xidtipe,  $xidkecamatan, $xidkabupaten, $xidjenisproperti,$xshort);
        $data['paging'] =$this->basemodel->pagination($xAwal, count($totalrow->result()), $xLimit, 'dosearchproduk');
        $data['judul'] = 'Daftar Properti Berdasarkan Pencarian'; 
        $data['urut'] = form_dropdown('edshort', $urut, $xshort,'id="edshort" onchange="dosearchproduk(0)" ');
        $data['listproperti'] = $listproperti;
        $this->json_data['listproduk'] = $this->load->view('scriptmedia/list-produk', $data, TRUE);
        echo json_encode($this->json_data);
    }
    function listpropertijenis() {
        $this->load->model('modelproduk');
        $this->load->model('basemodel');
        $this->load->model('modeltiperumah');
        $this->load->model('modeljenisproperti');
        $this->load->model('modelkondisi');
        $this->load->helper('form');
        $this->load->helper('json');
        $xAwal = $_POST['xAwal'];
        $xLimit = 10;
//        $xSearch = $_POST['xSearch'];
//        $xluas = $_POST['edidluas'];
//        $xharga = $_POST['edidharga'];
//        $xidtipe = $_POST['edidtipe'];
//        $xidkepemilikan = $_POST['edidkepemilikan'];
//        $xidkelurahan = $_POST['edidkelurahan'];
//        $xidkecamatan = $_POST['edidkecamatan'];
//        $xidkabupaten = $_POST['edidkabupaten'];
//        $xidkota = $_POST['edidkota'];
//        $xidprovinsi = $_POST['edidprovinsi'];
        $xshort= '';
        $urut = array(
            '0'=> 'Urut',
            '1'=> 'Luas A - Z',
            '2'=> 'Luas Z - A',
            '3'=> 'Tipe A - Z',
            '4'=> 'Tipe Z - A',
            '5'=> 'Harga A - Z',
            '6'=> 'Harga Z - A'
        );
        $xidjenisproperti = $_POST['edidjenisproperti'];
//        $xidsertifikat = $_POST['edidsertifikat'];
//        $xidkondisi = $_POST['edidkondisi'];
        $listproperti = $this->modelproduk->getListprodukshow($xAwal, $xLimit, '', '', '',  '', '', $xidjenisproperti,$urut);
        $totalrow = $this->modelproduk->getListprodukshow(0, 10000000, '', '', '',  '', '', $xidjenisproperti,$urut);
        $data['paging'] =$this->basemodel->pagination($xAwal, count($totalrow->result()), $xLimit, 'dosearchprodukjenisproperti',$xidjenisproperti);
        $data['judul'] = 'Daftar Properti Berdasarkan Jenis Properti'; 
        $data['urut'] = form_dropdown('edshort', $urut, $xshort,'id="edshort" onchange="dosearchproduk(0)" ');
        $data['listproperti'] = $listproperti;
        $this->json_data['listproduk'] = $this->load->view('scriptmedia/list-produk', $data, TRUE);
        echo json_encode($this->json_data);
    }
    function listpropertikabupaten() {
        $this->load->model('modelproduk');
        $this->load->model('basemodel');
        $this->load->model('modeltiperumah');
        $this->load->model('modeljenisproperti');
        $this->load->model('modelkondisi');
        $this->load->helper('form');
        $this->load->helper('json');
        $xAwal = $_POST['xAwal'];
        $xLimit = 10;
        $xidkabupaten = $_POST['edidkabupaten'];
        $this->load->model('modelkabupaten');
        $rowkabupaten = $this->modelkabupaten->getDetailkabupatenbykode($xidkabupaten);
//        $xidjenisproperti = $_POST['edidjenisproperti'];
        $xshort= '';
        $urut = array(
            '0'=> 'Urut',
            '1'=> 'Luas A - Z',
            '2'=> 'Luas Z - A',
            '3'=> 'Tipe A - Z',
            '4'=> 'Tipe Z - A',
            '5'=> 'Harga A - Z',
            '6'=> 'Harga Z - A'
        );
        $listproperti = $this->modelproduk->getListprodukshow($xAwal, $xLimit, '', '', '','' , $xidkabupaten,'',$urut);
        $totalrow = $this->modelproduk->getListprodukshow(0, 10000000, '', '', '','' , $xidkabupaten,'',$urut);
        $data['paging'] =$this->basemodel->pagination($xAwal, count($totalrow->result()), $xLimit, 'dosearchprodukkabupaten',$xidkabupaten);
        $data['judul'] = 'Daftar Properti di Daerah '.ucfirst($rowkabupaten->kabupaten); 
        $data['listproperti'] = $listproperti;
        $data['urut'] = form_dropdown('edshort', $urut, $xshort,'id="edshort" onchange="dosearchproduk(0)" ');
        $this->json_data['listproduk'] = $this->load->view('scriptmedia/list-produk', $data, TRUE);
        echo json_encode($this->json_data);
    }
   
    function detailproperti() {
        $this->load->model('modelproduk');
        $this->load->model('basemodel');
        $this->load->model('modeltiperumah');
        $this->load->model('modeljenisproperti');
        $this->load->model('modelkondisi');
        $this->load->helper('json');
        $xidx = $_POST['xidx'];
        
        $detailproperti = $this->modelproduk->getDetailproduk($xidx);
               
        $data['idproduk'] = $xidx;
        $data['detailproduk'] = $detailproperti;
        $data['relatedproperti'] = $this->relatedproperti();
        
        $data['sidebar'] = $this->load->view('scriptmedia/sidebar-survey', $data, TRUE);
        $data['formsurvey'] = $this->load->view('scriptmedia/formsurvey', $data, TRUE);
        $this->json_data['detailproduk'] = $this->load->view('scriptmedia/detailproduk', $data, TRUE);
        echo json_encode($this->json_data);
    }
    function relatedproperti() {
        $this->load->model('modelproduk');
        $this->load->model('basemodel');
        $this->load->model('modeltiperumah');
        $this->load->model('modeljenisproperti');
        $this->load->model('modelkondisi');
        
        $listproperti = $this->modelproduk->getListproduk(0, 10);
        
        $data['listproperti'] = $listproperti;
        return $this->load->view('scriptmedia/related-produk', $data, TRUE);
        
    }
    function survey(){
        $this->load->helper('json');
        $xidx = $_POST['xidx'];
        $data['form'] = '';
        $this->json_data['formsurvey'] = $this->load->view('scriptmedia/formsurvey', $data, TRUE);
                
        echo json_encode($this->json_data);
    }
    function showbanner($xidcontent) {
        $this->load->model('modelcontent');
        $main['isi'] = @$this->modelcontent->getDetailcontent($xidcontent)->isi;
        return $this->load->view('scriptmedia/banner', $main, TRUE);
    }
    function formsubmit(){
        $this->load->helper('json');
        $this->load->helper('common');
         $this->load->model('modelsurvey');
         $this->load->model('modelcustomer');
        
        $xtanggal = $_POST['edtanggal'];
        $xjam = $_POST['edjam'];
        $xNama = $_POST['edNama'];
        if($xNama=='undefined') $xNama ='';
        $xEmail = $_POST['edEmail'];
        if($xEmail=='undefined') $xEmail ='';
        $xTelpon = $_POST['edTelpon'];
        $xidproduk = $_POST['edidproduk'];
        $rowpegawai = $this->modelsurvey->getDetailsurveybyemail($xEmail);
        if (!empty($rowpegawai->idx)){
        $xidcustomer = $rowpegawai->idcustomer;
        }else {
            $xidcustomer = '';
            $xStr = $this->modelcustomer->setInsertcustomer('', '', $xNama, '', $xEmail, $xTelpon);

        }
//        $xketerangan = $_POST['edketerangan'];
//        $xidstatussurvey = $_POST['edidstatussurvey'];

       
        $idpegawai = $this->modelsurvey->getbatassurveybyemail($xEmail);
        if (!empty($idpegawai)) {
           $xStr = $this->modelsurvey->setInsertsurvey('', datetomysql($xtanggal), $xjam, $xidcustomer, $xNama, $xEmail, $xTelpon, $xidproduk, '', '');
           $this->json_data['pesan'] = 'Berhasil dikirim ..... ! ';
           echo json_encode($this->json_data);
        }else{
            $this->json_data['pesan'] = 'Maksimal untuk agenda survey 4 kali ';
            echo json_encode($this->json_data);
        }
        
    }
    function maincontent($idketegori = '') {
        $args = array(
            //'table' => 'content',
            'fields' => array('judul', 'isi'), //array
            'xawal' => 0,
            'xlimit' => 5,
            // 'xsearch' => '',
            'index' => 'idx',
            'idkategori' => $idketegori,
            'ctrdetail' => 'index.php/ctrview/moduledetail/',
            'fieldsshow' => array('judul', 'tanggal', 'isiawal', 'image1'), //array field yang muncul untuk detail page
            // 'pagination' =>false, //bollean
            //'paginationurl' =>'',
            'theme' => 'scriptmedia/content/content-news' //nama file template
        );

        $data['modul'] = array(
            $this->basemodel->modulelist($args));
        return $this->load->view("scriptmedia/content/content", $data, TRUE);
    }

    function maincontentgaleri($idketegori = '') {
        $args = array(
            //'table' => 'content',
            'fields' => array('judul', 'isi'), //array
            'xawal' => 0,
            'xlimit' => 5,
            // 'xsearch' => '',
            'index' => 'idx',
            'idkategori' => $idketegori,
            'ctrdetail' => 'index.php/ctrview/moduledetail/',
            'fieldsshow' => array('judul', 'tanggal', 'isiawal', 'image1'), //array field yang muncul untuk detail page
            // 'pagination' =>false, //bollean
            //'paginationurl' =>'',
            'theme' => 'scriptmedia/content/content-galeri' //nama file template
        );

        $data['modul'] = array(
            $this->basemodel->modulelist($args));
        return $this->load->view("scriptmedia/content/content", $data, TRUE);
    }

    function sidebar() {
        $argsagenda = array(
            //'table' => 'menu',
            'fields' => 'judul', //array
            'sidebartitle' => '<a href="' . base_url('index.php/ctrview/modullist/223') . '">Agenda Hari Ini</a>', //array
            'xawal' => 0,
            'xlimit' => 5,
            // 'xsearch' => '',
            'idkategori' => 223,
            'index' => 'idx',
            'ctrdetail' => 'index.php/ctrview/moduledetail/',
            'fieldsshow' => array('judul', 'isi'), //array
            'pagination' => false, //bollean
            //'paginationurl' =>'',
            'theme' => 'scriptmedia/widget/widget-survey' //nama file template
                // 'theme' => '' //nama file template
        );
        $argspengumuman = array(
            //'table' => 'menu',
            'fields' => 'judul', //array
            'sidebartitle' => '<a href="' . base_url('index.php/ctrview/modullist/226') . '">Pengumuman Terbaru</a>', //array
            'xawal' => 0,
            'xlimit' => 5,
            // 'xsearch' => '',
            'idkategori' => 226,
            'index' => 'idx',
            'ctrdetail' => 'index.php/ctrview/moduledetail/',
            'fieldsshow' => array('judul', 'tanggal', 'isi'), //array
            'pagination' => false, //bollean
            //'paginationurl' =>'',
            'theme' => 'scriptmedia/widget/widget-recenttweet' //nama file template
                // 'theme' => '' //nama file template
        );
        $argsgalery = array(
            //'table' => 'menu',
            'fields' => 'judul', //array
            'sidebartitle' => '<a href="' . base_url('index.php/ctrview/galeri/224') . '">Galeri</a>', //array
            'xawal' => 0,
            'xlimit' => 4,
            // 'xsearch' => '',
            'idkategori' => 224,
            'index' => 'idx',
            'ctrdetail' => 'index.php/ctrview/moduledetail/',
            'fieldsshow' => array('judul', 'tanggal', 'isi'), //array
            'pagination' => false, //bollean
            //'paginationurl' =>'',
            'theme' => 'scriptmedia/widget/widget-gallery' //nama file template
                // 'theme' => '' //nama file template
        );
        $argsprestasi = array(
            //'table' => 'menu',
            'fields' => 'judul', //array
            'sidebartitle' => '<a href="' . base_url('index.php/ctrview/modullist/238') . '">Prestasi Sekolah</a>', //array
            'xawal' => 0,
            'xlimit' => 5,
            // 'xsearch' => '',
            'idkategori' => 238,
            'index' => 'idx',
            'ctrdetail' => 'index.php/ctrview/moduledetail/',
            'fieldsshow' => array('judul', 'tanggal', 'isi'), //array
            'pagination' => false, //bollean
            //'paginationurl' =>'',
            'theme' => 'scriptmedia/widget/widget-recenttweet' //nama file template
                // 'theme' => '' //nama file template
        );

        $data['modul'] = array(
            $this->basemodel->modulelist($argsagenda),
//            $this->basemodel->modulelist($argspengumuman),
//            $this->basemodel->modulelist($argsgalery),
//            $this->basemodel->modulelist($argsprestasi),
            $this->basemodel->moduledetail(70, '', 'modulesingledetail'));
        return $this->load->view("scriptmedia/sidebar/sidebar", $data, TRUE);
    }

    function slider() {
        $this->load->model('modelimgslide');
        $this->load->model('basemodel');
        $qslider = $this->modelimgslide->getListimgslide(0, 10);
        foreach ($qslider->result() as $row) {
            $data['qslider'][] = array(
                'image' => (!empty($row->url)) ? $this->basemodel->showimage($row->url, 'slide') : '',
                'keterangan' => $row->keterangan,
                'link' => $row->link
            );
        }
        //$data['qslide']=$qslider;
        return $this->load->view("scriptmedia/slider", $data, TRUE);
    }

    function loginsiswa() {
        $this->load->helper('form');
        $datalogin['penggunalogin'] = 'siswa';
        $xidx = '';
        $xpassword = '';
        $xeuser_pengguna = '';
        $xpassword = (isset($_POST['edpassword_siswa'])) ? $_POST['edpassword_siswa'] : '';
        $xeuser_pengguna = (isset($_POST['eduser_siswa'])) ? $_POST['eduser_siswa'] : '';
        $this->load->model('modelsiswa');
        $user = $this->modelsiswa->getloginsiswa($xeuser_pengguna, $xpassword);
        $this->json_data['data'] = false;
        if (!empty($user)) {
            $this->session->set_userdata('statuslogin', 'siswa');
            $this->session->set_userdata('nama', $user->NamaSiswa);
            $this->session->set_userdata('pengguna', $user->idx);
            $this->json_data['data'] = true;
            $this->json_data['location'] = site_url() . "";
            $datalogin['error'] = $this->session->userdata('nama');
            redirect(base_url() . 'index.php/ctrmyaccount/');
        } else
            $datalogin['error'] = '';

        $data['maincontent'] = $this->load->view('scriptmedia/login', $datalogin, TRUE);
        $data['sidebar'] = $this->sidebar();
        $data['header'] = $this->basemodel->header();
        $data['slider'] = '';
        $data['footerwidget'] = $this->footerwidget();
        $data['footer'] = $this->basemodel->footer('');
        $this->load->view('scriptmedia/index', $data);
    }

    function loginguru() {
        $datalogin['penggunalogin'] = 'guru';
        $xidx = '';
        $xpassword = '';
        $xeuser_pengguna = '';
        $xpassword = (isset($_POST['edpassword_guru'])) ? $_POST['edpassword_guru'] : '';
        $xeuser_pengguna = (isset($_POST['eduser_guru'])) ? $_POST['eduser_guru'] : '';
        $this->load->model('modelguru');
        $user = $this->modelguru->getloginguru($xeuser_pengguna, $xpassword);
        $this->json_data['data'] = false;
        if (!empty($user)) {
            $this->session->set_userdata('statuslogin', 'guru');
            $this->session->set_userdata('nama', $user->NamaGuru);
            $this->session->set_userdata('pengguna', $user->idx);
            $this->json_data['data'] = true;
            $this->json_data['location'] = site_url() . "";
            $datalogin['error'] = $this->session->userdata('nama');
            redirect(base_url() . 'index.php/ctrmyaccountguru');
        } else
            $datalogin['error'] = '';

        $data['maincontent'] = $this->load->view('scriptmedia/login', $datalogin, TRUE);
        $data['sidebar'] = $this->sidebar();
        $data['header'] = $this->basemodel->header();
        $data['slider'] = '';
        $data['footerwidget'] = $this->footerwidget();
        $data['footer'] = $this->basemodel->footer('');
        $this->load->view('scriptmedia/index', $data);
    }

    function logout() {
        $this->session->sess_destroy();
        return redirect(site_url());
    }

    function kontak($send = '') {
        $this->load->helper('form');
        $this->load->helper('html');

        $this->load->model('modelcontacus');
        $data['name'] = null;
        $data['email'] = null;
        $data['message'] = null;
        $data['human'] = null;
        $data['errName'] = null;
        $data['errEmail'] = null;
        $data['errMessage'] = null;
        $data['errHuman'] = null;
        $data['result'] = null;
        if (isset($_POST["submit"])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $human = intval($_POST['human']);
            $from = $name;
            $to = 'admin@semuaberbagi.com';
            $subject = 'pesan dari website ';

            $body = "From: $name\n E-Mail: $email\n Message:\n $message";
            if (!$_POST['name']) {
                $data['errName'] = 'Please enter your name';
            }

            // Check if email has been entered and is valid
            if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $data['errEmail'] = 'Please enter a valid email address';
            }

            //Check if message has been entered
            if (!$_POST['message']) {
                $data['errMessage'] = 'Please enter your message';
            }
            //Check if simple anti-bot test is correct
            if ($human !== 5) {
                $data['errHuman'] = 'Your anti-spam is incorrect';
            }
            $this->load->library('email');

            $this->email->from($email, $from);
            $this->email->to($to);
            $this->email->cc($email);

            $this->email->subject($subject);
            $this->email->set_alt_message($body);
            if ($_POST['name'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['message'] && ($human == 5)) {
                if ($this->email->send()) {
                    $this->modelcontacus->setInsertcontacus('', $name, '', '', $email, $message, '');
                    $send = 1;
                    redirect(site_url('ctrview/kontak/' . $send), '');
                } else {
                    $result = '<div class="alert alert-danger">Maaf pesan anda tidak terkirim, silakan cek pengisian form</div>';
                }
            }
        }
        //$this->email->send();
        //echo $this->email->print_debugger();
        if ($send == 1) {
            $data['result'] = '<div class="alert alert-success">Terimakasih pesan anda segera kami tanggapi</div>';
        }
        $main['maincontent'] = $this->load->view('scriptmedia/kontak', $data, TRUE);
        $main['sidebar'] = '';
        $main['header'] = $this->basemodel->header();
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();

        $main['footer'] = $this->basemodel->footer('');

        $this->load->view('scriptmedia/index', $main);
    }

    function footerwidget() {
        $args = array(
            'table' => 'menu',
            'fields' => 'nmmenu', //array
            'xawal' => 0,
            'xlimit' => 5,
            'xsearch' => '',
            'index' => 'idmenu',
            'ctrdetail' => 'index.php/ctrview/moduledetail/',
            'fieldsshow' => array(), //array
            'pagination' => false, //bollean
            'paginationurl' => '',
            'theme' => 'scriptmedia/widget/widget' //nama file template
        );

        $data['widgetfooter'] = array($this->basemodel->modulelist($args),
            $this->basemodel->modulelist($args),
            $this->basemodel->modulelist($args),
            $this->basemodel->modulelist($args));
        return $this->load->view("scriptmedia/widget-footer", $data, TRUE);
    }

    function modulepengumuman() {
        $this->load->model('modelnews');
    }

    function maincontentsiswa($kelas = 1, $xawal = 0) {
        $this->load->helper('form');
        $this->load->helper('common');
        if (!empty($xawal)) {
            $xawal = $xawal - 1;
        }
        $xlimit = 30;
        $this->load->model('modelsiswa');
        $this->load->model('modelkelas');
        $rowkelas = $this->modelkelas->getDetailkelas($kelas);
        $data['dropdownkelas'] = '<div class="dropdownkelas">' . form_dropdown('edidkelas', $this->modelkelas->getArrayListkelas(), '', 'id="edidkelas" style = "width:100px" class="form-control pull-right" onchange="dosearchbykelas();"') . '<span class="pull-right" style="padding:5px;font-weight:bold">Kelas</span></div>';

        $query = null;
        $data['kelas'] = @$rowkelas->NamaKelas;
        $query = $this->modelsiswa->getListsiswabynoinduk($xawal * $xlimit, $xlimit, $kelas);
        $data['modules'] = $query;

        $queryjum = $this->modelsiswa->getListsiswabynoinduk(0, 100000, $kelas);
        //print_r($queryjum);
        $data['pagination'] = $this->basemodel->pagination(base_url('index.php/ctrview/maincontentsiswa/' . $kelas), $queryjum->num_rows, $xlimit, 4);
        // $data['modules'] = $query;
        $main['maincontent'] = $this->load->view("scriptmedia/content/content-siswa", $data, TRUE);
        $main['sidebar'] = $this->sidebar();
        $main['header'] = $this->basemodel->header('<script type="text/javascript">function getBaseURL() {return "' . base_url() . '";}</script>');
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();
        $main['title'] = 'Data Siswa';
        $main['footer'] = $this->basemodel->footer();
        $this->load->view('scriptmedia/index', $main);
    }

    function searchbykelas($kelas = 0) {
        $this->load->helper('form');
        $this->load->helper('common');
        $xawal = 0;
        $xlimit = 30;
        $this->load->model('modelsiswa');
        $this->load->model('modelkelas');
        $rowkelas = $this->modelkelas->getDetailkelas($kelas);
        //$data['dropdownkelas'] = '<div class="dropdownkelas">'.form_dropdown('edidkelas', $this->modelkelas->getArrayListkelas(), '', 'id="edidkelas" style = "width:70px" class="form-control pull-right" onchange="dosearchbykelas();"').'<span class="pull-right" style="padding:2px;font-weight:bold">Kelas</span></div>' ;

        $query = null;
        $data['kelas'] = @$rowkelas->NamaKelas;
        $query = $this->modelsiswa->getListsiswabynoinduk($xawal, $xlimit, $kelas);
        $queryjum = $this->modelsiswa->getListsiswabynoinduk(0, 10000, $kelas);
        //print_r($queryjum);
        $data['modules'] = $query;
        $data['pagination'] = $this->basemodel->pagination(base_url('index.php/ctrview/maincontentsiswa/' . $kelas . '/'), $queryjum->num_rows, $xlimit, 4);

        $main = $this->load->view("scriptmedia/content/content-siswa", $data, TRUE);
        $this->load->helper('json');
        $this->json_data['tabledatasiswa'] = $main;
        echo json_encode($this->json_data);
    }

    function searchbytahun($tahun = '') {
        //if ($kelas==0)$kelas = '';
        $this->load->helper('form');
        $this->load->helper('common');
        $xawal = 0;
        $xlimit = 30;
        $this->load->model('modelalumni');
        //$this->load->model('modelkelas');
        $querykelas = $this->modelalumni->getListalumnibytahunlulus($xawal, $xlimit, $tahun);
        $querykelasjum = $this->modelalumni->getListalumnibytahunlulus(0, 10000, $tahun);
        // $data['dropdownkelas'] = setForm('edidkelas', 'Kelas', form_dropdown('edidkelas', $this->modelkelas->getArrayListkelas(), '', 'id="edidkelas" style = "width:200px" class="form-control" onchange="dosearchbykelas();"'));
        $data['modules'] = $querykelas;
        $data['pagination'] = $this->basemodel->pagination(base_url('index.php/ctrview/maincontentalumni/' . $tahun), $querykelasjum->num_rows, $xlimit, 4);
        $main = $this->load->view("scriptmedia/content/content-alumni", $data, TRUE);
        $this->load->helper('json');
        $this->json_data['tabledatasiswa'] = $main;
        echo json_encode($this->json_data);
    }

    function searchbystaf($idstaf = '') {
        //if ($kelas==0)$kelas = '';
        $this->load->helper('form');
        $this->load->helper('common');
        $xawal = 0;
        $xlimit = 20;
        $this->load->model('modelguru');
        $querykelas = $this->modelguru->getListguruOrder($xawal, $xlimit, $idstaf);
        $querykelasjum = $this->modelguru->getListguruOrder(0, 1000, $idstaf);
        // $data['dropdownkelas'] = setForm('edidkelas', 'Kelas', form_dropdown('edidkelas', $this->modelkelas->getArrayListkelas(), '', 'id="edidkelas" style = "width:200px" class="form-control" onchange="dosearchbykelas();"'));
        $data['modules'] = $querykelas;
        $data['pagination'] = $this->basemodel->pagination(base_url('index.php/ctrview/maincontentguru/' . $idstaf), $querykelasjum->num_rows, $xlimit, 4);

        $main = $this->load->view("scriptmedia/content/content-guru", $data, TRUE);
        $this->load->helper('json');
        $this->json_data['tabledatasiswa'] = $main;
        echo json_encode($this->json_data);
    }

    function maincontentalumni($tahun = '2016', $xawal = 0) {
        if (!empty($xawal)) {
            $xawal = $xawal - 1;
        }
        $xlimit = 30;
        $this->load->helper('form');
        $this->load->helper('common');

        $this->load->model('modelalumni');
        $query = $this->modelalumni->getListalumnibytahunlulus($xawal * $xlimit, $xlimit, $tahun);
        $queryjum = $this->modelalumni->getListalumnibytahunlulus(0, 100000, $tahun);
        $data['dropdownkelas'] = '<div class="dropdownkelas">' . form_dropdown('edidtahun', $this->modelalumni->getArrayListtahunlulus(), '', 'id="edidtahun" style = "width:90px" class="form-control pull-right" onchange="dosearchbytahun();"') . '<span class="pull-right" style="padding:5px;font-weight:bold">Tahun</span></div>';

        $data['pagination'] = $this->basemodel->pagination(base_url('index.php/ctrview/maincontentalumni/' . $tahun), $queryjum->num_rows, $xlimit, 4);
        $data['modules'] = $query;
        $main['maincontent'] = $this->load->view("scriptmedia/content/content-alumni", $data, TRUE);
        $main['title'] = 'Data Alumni';
        $main['sidebar'] = $this->sidebar();
        $main['header'] = $this->basemodel->header('<script type="text/javascript">function getBaseURL() {return "' . base_url() . '";}</script>');
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();
        $main['footer'] = $this->basemodel->footer();
        $this->load->view('scriptmedia/index', $main);
    }

    function maincontentguru($xidstaf = 1, $xawal = 0) {
        if (!empty($xawal)) {
            $xawal = $xawal - 1;
        }
        $xlimit = 20;
        $this->load->helper('form');
        $this->load->helper('common');
        $this->load->model('modelguru');
        $this->load->model('modeljenisstaff');
        $query = $this->modelguru->getListguruOrder($xawal * $xlimit, $xlimit, $xidstaf);
        $queryjum = $this->modelguru->getListguruOrder(0, 100000, $xidstaf);
        //print_r($queryjum);
        $data['dropdownkelas'] = '<div class="dropdownkelas">' . form_dropdown('edidstaf', $this->modeljenisstaff->getArrayListjenisstaff(), '', 'id="edidstaf" style = "width:150px" class="form-control pull-right" onchange="dosearchbystaf();"') . '<span class="pull-right" style="padding:5px;font-weight:bold">Jabatan</span></div>';
        $data['pagination'] = $this->basemodel->pagination(base_url('index.php/ctrview/maincontentguru/' . $xidstaf), $queryjum->num_rows, $xlimit, 4);
        $data['modules'] = $query;
        $main['maincontent'] = $this->load->view("scriptmedia/content/content-guru", $data, TRUE);
        $main['title'] = 'Data Pendidik dan Tenaga Kependidikan';
        $main['sidebar'] = $this->sidebar();
        $main['header'] = $this->basemodel->header('<script type="text/javascript">function getBaseURL() {return "' . base_url() . '";}</script>');
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();
        $main['footer'] = $this->basemodel->footer();
        $this->load->view('scriptmedia/index', $main);
    }

    function modullist($idketegori = '') {
        $main['maincontent'] = $this->maincontent($idketegori);
        $main['sidebar'] = $this->sidebar();
        $main['header'] = $this->basemodel->header('<script type="text/javascript">function getBaseURL() {return "' . base_url() . '";}</script>');
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();
        $main['footer'] = $this->basemodel->footer();
        $this->load->model('modelmenu');
        $title = $this->modelmenu->getDetailmenu($idketegori);
        $main['title'] = $title->nmmenu;
        $this->load->view('scriptmedia/index', $main);
        //return $this->load->view("scriptmedia/content/content", $data,TRUE);
    }

    function moduledetail($xid) {
        $main['maincontent'] = $this->basemodel->moduledetail($xid);
        $main['sidebar'] = $this->sidebar();
        $main['header'] = $this->basemodel->header('<script type="text/javascript">function getBaseURL() {return "' . base_url() . '";}</script>');
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();
        $main['footer'] = $this->basemodel->footer();
        //$data['title'] = 'Oficial website SMK Negeri 2 Simpang Empat';
        $this->load->view('scriptmedia/index', $main);
    }

    function singledetail($xid) {
        $main['maincontent'] = $this->basemodel->moduledetail($xid, '', 'modulesingledetail');
        $main['sidebar'] = $this->sidebar();
        $main['header'] = $this->basemodel->header('<script type="text/javascript">function getBaseURL() {return "' . base_url() . '";}</script>');
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();
        $main['footer'] = $this->basemodel->footer();
        $main['title'] = 'Oficial website SMK Negeri 2 Simpang Empat';
        $this->load->view('scriptmedia/index', $main);
    }

    function galeri($idketegori = '') {
        $main['maincontent'] = $this->maincontentgaleri($idketegori);
        $main['sidebar'] = $this->sidebar();
        $main['header'] = $this->basemodel->header('<script type="text/javascript">function getBaseURL() {return "' . base_url() . '";}</script>');
        $main['slider'] = '';
        $main['footerwidget'] = $this->footerwidget();
        $main['footer'] = $this->basemodel->footer();
        $main['title'] = 'Oficial website SMK Negeri 2 Simpang Empat';
        $this->load->view('scriptmedia/index', $main);
    }

}

?>
