<?php

class ctrfiluploadfile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('upload');
    }

    public function upload_file() {
        $status = "";
        $msg = "";

        $userfile = $_POST['userfile'];

        $file_element_name = $userfile;

        $config['upload_path'] = './resource/uploaded/file/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt|*';
        $config['max_size'] = 100000000;
        $config['encrypt_name'] = false;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_element_name)) {
            echo "erorrr";
        } else {
            $res = $this->upload->data();
            $file_path = $res['file_path'];
            $file = $res['full_path'];
            $file_ext = $res['file_ext'];
        }
        $this->load->helper('json');
        $this->json_data['file'] = $data['file_name'];
        echo json_encode($this->json_data);
    }

    public function upload(){

      $allowed = array('png', 'jpg', 'gif','zip','*');

      if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

       $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

       if(move_uploaded_file($_FILES['upl']['tmp_name'], './resource/uploaded/file/'.$_FILES['upl']['name'])){
        echo '{"status":"success"}';
        exit;
      }
    }

    echo '{"status":"error"}';
    exit;
  }
}

?>