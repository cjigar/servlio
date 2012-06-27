<?php

class Home extends CI_Controller {
    
     public function index() {
        $this->load->model('home_model');
        $this->load->library('session'); 
        $data = array();
        $data = $this->home_model->homepagelisting();
        $this->load->view('home/index',$data);
    }
    function homepage_ajax() {
        $this->load->model('home_model');
        $data = $this->home_model->homepagelisting();
        if($data['total_rows']==0) {
            echo "0";exit;
        }
        $this->load->view('home/homepage_ajax',$data);
    }
}