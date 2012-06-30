<?php

class Home extends CI_Controller {
    
     public function index() {
        
        $this->load->model('home_model');
        $this->load->library('session'); 
        $data = array();
        
        $this->load->helper('country');
        $this->load->model('users_model');
               
        $data = $this->home_model->homepagelisting();
        $data['currency'] = $this->users_model->getCurrency();
        $data['categories'] = $this->users_model->getCategories();
        $data['popularservices'] = $this->home_model->getPopularServices();
        $this->load->view('home/index',$data);
    }
     public function favorites() {
        
        $this->load->library('session');

        
        if($this->uri->segments[2]=="" && $this->session->userdata('iUserId')=="") {
            header("location:".base_url());
        } 
        $this->load->model('home_model');
         
        $data = array();
        
        $this->load->helper('country');
        $this->load->model('users_model');
               
        $data = $this->home_model->homepagelisting("favorite");
        $data['currency'] = $this->users_model->getCurrency();
        $data['categories'] = $this->users_model->getCategories();
        $data['popularservices'] = $this->home_model->getPopularServices();
        $this->load->view('home/favorites',$data);
    }    
    function AddToFavorite() {
        $this->load->model('home_model');
        $this->load->library('session');
         
        $iUserId = $this->session->userdata('iUserId');
        $iCompanyServiceId = $_POST['iCompanyServiceId'];
        if($iUserId=="") {
            $ip = $_SERVER["REMOTE_ADDR"];
            $data = $this->home_model->insertFav($ip, $iCompanyServiceId,"IP");
        }else {
            $data = $this->home_model->insertFav($iUserId, $iCompanyServiceId,"User");
        }
        
               
        
        echo $data;exit;
    
    }
    function homepage_ajax() {
        $this->load->model('home_model');
        $data = $this->home_model->homepagelisting("favorite");
        if($data['total_rows']==0) {
            echo "0";exit;
        }
        $this->load->view('home/homepage_ajax',$data);
    }    
    function favpage_ajax() {
        $this->load->model('home_model');
        $data = $this->home_model->homepagelisting("favorite");
        if($data['total_rows']==0) {
            echo "0";exit;
        }
        $this->load->view('home/homepage_ajax',$data);
    }
    function getService() {
        $this->load->model('home_model');
        $options['iCategoryId'] = $this->input->post('iCategoryId', TRUE);
        $html = $this->home_model->getService($options);
        echo $html;
    }
    function city_suggestions() {
        $this->load->model('home_model');
        $term = $this->input->get('term', TRUE);
        $vStateCode = $this->input->get('vStateCode', TRUE);
        $vCountryCode = $this->input->get('vCountryCode', TRUE);

        if (strlen($term) < 2)
            break;

        $keywords = $this->home_model->GetAutocompleteCity(array('keyword' => $term, 'vStateCode' => $vStateCode, 'vCountryCode' => $vCountryCode));

        echo $keywords;
    }    
}