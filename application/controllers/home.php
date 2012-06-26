<?php

class Home extends CI_Controller {
    
     public function index() {
        $this->load->library('session'); 
        $data = array();
        $this->template->build('home/index',$data);
    }
}