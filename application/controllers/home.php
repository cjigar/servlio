<?php

class Home extends CI_Controller {
    
     public function index() {
        $this->load->library('session'); 
        $data = array();
        $this->load->view('home/index',$data);
    }
}