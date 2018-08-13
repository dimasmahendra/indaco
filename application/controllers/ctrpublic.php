<?php if(!defined('BASEPATH')) exit('Tidak Diperkenankan mengakses langsung'); 

class ctrpublic extends CI_Controller
{
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data = $this->db->get('in_homepage')->result_array();
		$return = $data[0];
		$return['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'INDACO',
			'css' => site_url('resource/indaco/css/home.css'),
			'js' => array(
				site_url('resource/indaco/js/indaco.js'),
				site_url('resource/indaco/js/plugins.js'),
				site_url('resource/indaco/js/home.js')
			),
			'data' => $return['data'],
			'body'  => $this->load->view('indaco/home', $return, true)
		));
	}

	public function product($type = null)
	{
		$return['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'PRODUCT - INDACO',
			'css' => site_url('resource/indaco/css/product.css'),
			'js' => array(
				site_url('resource/indaco/js/indaco.js'),
				site_url('resource/indaco/js/plugins.js'),
				site_url('resource/indaco/js/product.js')
			),
			'body'  => $this->load->view('indaco/product', $return, true)
		));
	}

	public function productDetail($type_id)
	{
		$data = $this->db->get_where('in_products',
				array(
					'type_id' => $type_id
				)
			)->result_array()
		;
		$resource = array();
		foreach ($data as $key => $value) {
			/*======== CSS Class ========*/
			// $last = '';
			if ($value['type_id'] == 1) {
				$first = "belazo";
			}
			if ($value['type_id'] == 2) {
				$first = "envi";
			}
			if ($value['type_id'] == 3) {
				$first = "topseal";
			}
			if ($value['type_id'] == 4) {
				$first = "hotseal";
			}
			if ($value['type_id'] == 5) {
				$first = "tinting";
			}
			if ($value['type_id'] == 6) {
				$first = "modacon";
			}
			if ($value['type_id'] == 7) {
				$first = "nusatex";
			}

			if (strpos($value['name'], 'Alkali') !== false) {
			    $last = "-alkalisealer";
			}	
			else if (strpos($value['name'], 'Kidzdream') !== false) {
			    $last = "-kidzdream";
			}		
			else if (strpos($value['name'], 'Maxima') !== false) {
			    $last = "-maxima";
			}
			else if (strpos($value['name'], 'A.G.E') !== false) {
			    $last = "-age";
			}
			else if (strpos($value['name'], 'Climagard') !== false) {
			    $last = "-climagard";
			}
			else if (strpos($value['name'], 'Roof') !== false) {
			    $last = "-roofpaint";
			}
			else if (strpos($value['name'], 'Wood') !== false) {
			    $last = "-woodfiller";
			}
			else if (strpos($value['name'], 'Woodstain') !== false) {
			    $last = "-woodstain";
			}
			else if (strpos($value['name'], 'Graniteur') !== false) {
			    $last = "-graniteur";
			}
			else if (strpos($value['name'], 'Dempul Tembok') !== false) {
			    $last = "-wallputty";
			}
			else if (strpos($value['name'], 'Acian Semen') !== false) {
			    $last = "-acian";
			}
			else if (strpos($value['name'], 'Waterproofing 2K-S21') !== false) {
			    $last = "-2k-s21";
			}
			else if (strpos($value['name'], 'Waterproofing 2K-S41') !== false) {
			    $last = "-2k-s41";
			}
			else if (strpos($value['name'], 'Anti Karat') !== false) {
			    $last = "-antikarat";
			}
			else if (strpos($value['name'], 'Cat Paving') !== false) {
			    $last = "-catpaving";
			}
			else if (strpos($value['name'], 'Meni Kayu') !== false) {
			    $last = "-menikayu";
			}

			// print_r($value);
			// echo 'AAAAA'.$first . $last;
			if (in_array($first, array('topseal', 'hotseal', 'tinting')))
				$value['class'] = $first;
			else
				$value['class'] = $first . $last;

			/*======== Feature ========*/
			$feature = json_decode($value['features_id'], true);
			$feature = array_filter($feature);
			$features = array();
			foreach ($feature as $index => $val) {
				$sql = "SELECT * FROM `in_product_feature` WHERE `id` = $val ";
				$query = $this->db->query($sql);
        		$result = $query->result_array();
        		$features[] = $result[0];
			}
			$value['features_id'] = $features;
			
			/*======== Color Image ========*/
			$sqlcolor = "SELECT in_product_color.id, in_product_type.name as product, in_product_color.name, in_product_color.code ,in_product_color.image
						FROM `in_product_color` 
						LEFT JOIN `in_product_type` on `in_product_color`.`product_id` = `in_product_type`.id
						WHERE `in_product_color`.`product_id` = " . $value['id'] ;
			$query = $this->db->query($sqlcolor);
        	$result = $query->result_array();
			$value['color'] = $result;

			/* ==================== Files ====================*/
			$sql = "SELECT * FROM `in_product_file` WHERE `product_id` = " . $value['id'] ;
			$query = $this->db->query($sql);
        	$result = $query->result_array();
			$value['file'] = $result;

			$resource[] = $value;
		}
		$return['data'] = $resource;

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'PRODUCTS',
			'css' => array(
				site_url('resource/indaco/css/jquery.mCustomScrollbar.css'),
				site_url('resource/indaco/css/product.css')
			),
			'js' => array(
				site_url('resource/indaco/js/jquery.mCustomScrollbar.concat.min.js'),
				site_url('resource/indaco/js/indaco.js'),
				site_url('resource/indaco/js/products.js')
			),
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/products', $return, true)
		));
	}

	public function inspirasi()
	{
		$this->db->select('in_inspirasi.id, in_inspirasi.name, in_inspirasi_detail.inspirasi_id, in_inspirasi_detail.name as inspirasi_name, in_inspirasi_detail.image1, in_inspirasi_detail.image2');
        $this->db->from('in_inspirasi');
        $this->db->join('in_inspirasi_detail', 'in_inspirasi.id = in_inspirasi_detail.inspirasi_id', 'left');
        $query = $this->db->get();
        $data  = $query->result_array();

        $data = $this->db->get('in_inspirasi')->result_array();
        $resource = array();
        foreach ($data as $key => $value) {
        	$detail = $this->db->get_where('in_inspirasi_detail',
					array(
						'inspirasi_id' => $value['id']
					)
				)->result_array()
			;
			$resource_detail = array();
			foreach ($detail as $index => $val) {
				if ($index == 0) {
					$val['active'] = "active";
				}
				else {
					$val['active'] = "";	
				}
				$resource_detail[] = $val;	
			}
			$value['detail'] = $resource_detail;

			$last = '';

        	if (strpos($value['name'], 'Inspirasi 1') !== false) {
			    $last = "homey";
			}
			if (strpos($value['name'], 'Inspirasi 2') !== false) {
			    $last = "creamy";
			}
			if (strpos($value['name'], 'Inspirasi 3') !== false) {
			    $last = "firm";
			}
			if (strpos($value['name'], 'Inspirasi 4') !== false) {
			    $last = "modern";
			}
			if (strpos($value['name'], 'Inspirasi 5') !== false) {
			    $last = "fresh";
			}
			$value['class'] = $last;

        	$resource[] = $value;
        }
        $return['data'] = $resource;

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'INSPIRASI - INDACO',
			'css' => array(
				site_url('resource/indaco/css/jquery.mCustomScrollbar.css'),
				site_url('resource/indaco/css/inspirasi.css')
			),
			'js' => array(				
				site_url('resource/indaco/js/jquery.mCustomScrollbar.concat.min.js'),
				site_url('resource/indaco/js/indaco.js'),
				site_url('resource/indaco/js/3d-carousel.js'),
				site_url('resource/indaco/js/inspirasi.js')
			),
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/inspirasi', $return, true)
		));
	}

	public function cara_kami()
	{
		$return = [];
		$return['img_url'] = site_url( 'resource/uploaded/img/postcontent/' );
		// get eksterior id
		$kat_eksterior = $this->db->where('name = "Eksterior"')
								  ->get('in_post_categories')
								  ->row();
		$kat_eksterior_id = $kat_eksterior->id;

		// get interior id
		$kat_interior = $this->db->where('name = "Interior"')
								  ->get('in_post_categories')
								  ->row();
		$kat_interior_id = $kat_interior->id;

		// get interior id
		$kat_video = $this->db->where('name = "Video Tutorial"')
								  ->get('in_post_categories')
								  ->row();
		$kat_video_id = $kat_video->id;

		$eksterior = [];
		$interior = [];
		$video = [];

		$post_content = $this->db->get('in_post_content')->result();
		foreach ($post_content as $post)
		{
			if ($post->categories)
			{
				$cat = json_decode( $post->categories, true );
				// for eksterior
				if (in_array($kat_eksterior_id, $cat))
				{
					$eksterior[] = $post;
				}
				// for interior
				if (in_array($kat_interior_id, $cat))
				{
					$interior[] = $post;
				}
				// for video
				if (in_array($kat_video_id, $cat))
				{
					$video[] = $post;
				}
			}
		}

		$return['eksterior'] = $eksterior;
		$return['interior'] = $interior;
		$return['video'] = $video;
		// $resource = array();
		// foreach ($kategori as $key => $value) {
		// 	$detail = $this->db->get('in_post_content')->result_array();
		// 	$detail_temp = array();
		// 	foreach ($detail as $index => $val) {
		// 		$kat = json_decode($val['categories'], true);
		// 		$val['categories'] = $kat;
		// 		if (in_array($value['id'], $val['categories'])) {
		// 			$detail_temp[] = $val;					
		// 		}					
		// 	}
		// 	$value['kat'] = $detail_temp;	

		// 	if ($key == 0) {
		// 		$value['active'] = "show active";
		// 	}
		// 	else {
		// 		$value['active'] = "";	
		// 	}

		// 	$resource[] = $value;
		// }
		// $return['data'] = $resource;

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'CARA KAMI - INDACO',
			'js' => array(				
				site_url('resource/indaco/js/jquery.mCustomScrollbar.concat.min.js'),
				site_url('resource/indaco/js/indaco.js')
			),
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/cara_kami', $return, true)
		));
	}

	public function tentang_kami()
	{
		$return['img_url'] = site_url( 'resource/' );

		$kat = $this->db->where('name = "Sejarah"')->get('in_post_categories')->row();
		$sejarah_id = $kat->id;

		$kat = $this->db->where('name = "Visi Misi"')->get('in_post_categories')->row();
		$visimisi_id = $kat->id;

		$kat = $this->db->where('name = "TVC Indaco"')->get('in_post_categories')->row();
		$tvc_id = $kat->id;

		$kat = $this->db->where('name = "Hymne"')->get('in_post_categories')->row();
		$hymne_id = $kat->id;

		$post_content = $this->db->get('in_post_content')->result();
		$tvc_indaco = [];
		foreach ($post_content as $post)
		{
			if ($post->categories)
			{
				$cat = json_decode( $post->categories, true );
				// for sejarah
				if (in_array($sejarah_id, $cat) && !isset($sejarah))
				{
					$sejarah = $post;
				}
				// for visimis
				if (in_array($visimisi_id, $cat) && !isset($visimisi))
				{
					$visimisi = $post;
				}
				// for tvc
				if (in_array($tvc_id, $cat))
				{
					$tvc_indaco[] = $post;
				}

				// for hymne
				if (in_array($hymne_id, $cat) && !isset($hymne))
				{
					$hymne = $post;
				}
			}
		}

		$return['sejarah'] = $sejarah;
		$return['visimisi'] = $visimisi;
		$return['tvc_indaco'] = $tvc_indaco;
		$return['hymne'] = $hymne;

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'TENTANG KAMI - INDACO',
			'data' => $hasil['data'],
			'js' => array(				
				site_url('resource/indaco/js/tentang_kami.js')
			),
			'body'  => $this->load->view('indaco/tentang_kami', $return, true)
		));
	}

	public function hubungi_kami($action = null)
	{
		$return = [];

		if ($action == 'tanya_brosolin')
		{
			$nama = $_POST['nama'];
			$masalah = $_POST['masalah'];

			$arr_simpan = array(
				'nama' => $nama,
				'masalah' => $masalah,
				'created' => date('U'),
			);
			$this->db->insert('in_brosolin', $arr_simpan);
			exit;
		}

		$depos = $this->db->get('in_depo')->result();
		$return['depos'] = $depos;

		$depo_utama = $this->db->where('depo_utama = 1')->get('in_depo')->row();
		$return['depo_utama'] = (array)$depo_utama;

		$return['img_url'] = site_url( 'resource/uploaded/img/postcontent/' );

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'HUBUNGI KAMI - INDACO',
			'js' => array(
				site_url('resource/indaco/js/jquery-ui.js'),
				site_url('resource/indaco/js/popper.min.js'),
				'//maps.googleapis.com/maps/api/js?libraries=places&sensor=false&key=AIzaSyASo2vyxH5Jtospri11CkSV-d2Nv0JDyfg',
				site_url('resource/indaco/js/snazzy-info-window.min.js'),
				site_url('resource/indaco/js/jquery.mCustomScrollbar.concat.min.js'),
				site_url('resource/indaco/js/peta.js'),
				site_url('resource/indaco/js/hubungi_kami.js')
			),
			'css' => array(
				site_url('resource/indaco/css/jquery.mCustomScrollbar.css'),
				site_url('resource/indaco/css/bootstrap-select.min.css'),
				site_url('resource/indaco/css/jquery-ui.css'),
				site_url('resource/indaco/css/snazzy-info-window.min.css'),
				site_url('resource/indaco/css/hubungi_kami.css'),
			),
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/hubungi_kami', $return, true)
		));
	}

	public function proyek()
	{
		$return = [];

		$return['img_url2'] = site_url( 'resource/indaco/' );
		$return['img_url'] = site_url( 'resource/uploaded/img/postcontent/' );
		// get eksterior id
		$kat_proyek = $this->db->where('name = "Proyek"')
								  ->get('in_post_categories')
								  ->row();
		$kat_proyek_id = $kat_proyek->id;

		$proyek = [];

		$post_content = $this->db->get('in_post_content')->result();
		foreach ($post_content as $post)
		{
			if ($post->categories)
			{
				$cat = json_decode( $post->categories, true );
				// for proyek
				if (in_array($kat_proyek_id, $cat))
				{
					$proyek[] = $post;
				}
			}
		}

		$return['proyek'] = $proyek;

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'PROYEK - INDACO',
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/proyek', $return, true)
		));
	}

	public function csr()
	{
		$return = [];

		$return['img_url2'] = site_url( 'resource/indaco/' );
		$return['img_url'] = site_url( 'resource/uploaded/img/postcontent/' );

		$csr = [];

		// get eksterior id
		$kat_csr = $this->db->where('name = "Csr"')
								  ->get('in_post_categories')
								  ->row();
		if ($kat_csr)
		{
			$kat_csr_id = $kat_csr->id;

			$post_content = $this->db->get('in_post_content')->result();
			foreach ($post_content as $post)
			{
				if ($post->categories)
				{
					$cat = json_decode( $post->categories, true );
					// for CSR
					if (in_array($kat_csr_id, $cat))
					{
						$csr[] = $post;
					}
				}
			}
		}

		$return['csr'] = $csr;

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'CSR - INDACO',
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/csr', $return, true)
		));
	}

	public function faq()
	{
		$return = [];

		$return['img_url2'] = site_url( 'resource/indaco/' );

		$faq = [];

		// get eksterior id
		$kat_faq = $this->db->where('name = "Faq"')
								  ->get('in_post_categories')
								  ->row();
		if ($kat_faq)
		{
			$kat_faq_id = $kat_faq->id;

			$post_content = $this->db->get('in_post_content')->result();
			foreach ($post_content as $post)
			{
				if ($post->categories)
				{
					$cat = json_decode( $post->categories, true );
					// for CSR
					if (in_array($kat_faq_id, $cat))
					{
						$faq[] = $post;
					}
				}
			}
		}

		$return['faq'] = $faq;

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'FAQ - INDACO',
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/faq', $return, true)
		));
	}

	public function subscriber_save()
	{
		$subs_email = $_POST['subs_email'];
		$cek_email = $this->db->where('email = "'.$subs_email.'"')
							  ->get('in_subscriber')
							  ->row();
		if (filter_var($subs_email, FILTER_VALIDATE_EMAIL)) {
			if (!$cek_email)
			{
				$this->db->insert('in_subscriber', array('email' => $subs_email, 'created' => date('U')));
			}
		}
			
	}

	public function search()
	{
		$data = [];
		$key = $this->input->get('key');

		$arr_tmp = [];

		$posts = $this->db->select()
						  ->or_where(array(
						  	'a.title like' => '%'.$key.'%',
						  	'a.author like' => '%'.$key.'%',
						  	'a.content like' => '%'.$key.'%',
						  ))
						  ->get('in_post_content as a')
						  ->result();
						  // echo $this->db->last_query();

		foreach ($posts as $post)
		{
			$categories = '';
			$skip = false;
			if ($post->categories)
			{
				$cat_arr = json_decode( $post->categories, true );

				if ($cat_arr)
				{
					$cats = [];
					foreach ($cat_arr as $cat_id)
					{
						$cat_db = $this->db->where('id = '.$cat_id)
										   ->get('in_post_categories')
										   ->row();
						$cats[] = $cat_db->name;

						if (in_array($cat_id, array(3, 4, 5, 6, 7, 10)))
							$skip = true;
					}

					$categories = implode(', ', $cats);
				}
			}

			if (!$skip)
			{
				$arr_tmp[] = array(
					'type' => 'post',
					'title' => $post->title,
					'content' => substr(strip_tags($post->content), 0, 200),
					'categories' => $categories,
					'link' => '#',
					'full_data' => $post,
				);
			}
		}

		$products = $this->db->select('a.*, b.name as type_name')
							 ->join('in_product_type as b', 'b.id = a.type_id', 'left')
							 ->or_where(array(
							 	'a.name like' => '%'.$key.'%',
							 	'a.type_title like' => '%'.$key.'%',
							 	'a.ind_description like' => '%'.$key.'%',
							 ))
							 ->get('in_products as a')
							 ->result();
		foreach ($products as $product)
		{
			$arr_tmp[] = array(
				'type' => 'product',
				'title' => $product->name,
				'content' => substr(strip_tags($product->ind_description), 0, 200),
				'categories' => $product->type_name,
				'link' => site_url( 'productDetail/'.$product->type_id ),
				'full_data' => $product,
			);
		}

		$data['results'] = $arr_tmp;
		$data['img_url'] = site_url( 'resource/uploaded/img/postcontent/' );

		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main', array(
			'title' => 'PENCARIAN - INDACO',
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/search', $data, true)
		));
	}

	public function berita()
	{
		$return = [];

		$return['img_url2'] = site_url( 'resource/indaco/' );

		$berita = [];

		// get eksterior id
		$kat_berita = $this->db->where('name = "Berita"')
								  ->get('in_post_categories')
								  ->row();
		if ($kat_berita)
		{
			$kat_berita_id = $kat_berita->id;

			$post_content = $this->db->get('in_post_content')->result();
			foreach ($post_content as $post)
			{
				if ($post->categories)
				{
					$cat = json_decode( $post->categories, true );
					// for CSR
					if (in_array($kat_berita_id, $cat))
					{
						$berita[] = $post;
					}
				}
			}
		}

		$return['berita'] = $berita;
		$hasil['data'] = $this->db->get('in_product_type')->result_array();
		$this->load->view('indaco/main2', array(
			'title' => 'Berita - INDACO',
			'data' => $hasil['data'],
			'body'  => $this->load->view('indaco/berita', $return, true)
		));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */