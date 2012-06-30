<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('session');
    }

    public function index() {
        redirect('/');
        exit;
    }

    public function login() {
        $sessiAdminId = $this->session->userdata('iAdminId');
        if($sessiAdminId != ''){
            redirect('admin/users_plan');
            exit;            
        }
        $this->load->view('admin/login');
    }

    function login_a() {
        //echo "<pre>";
        //print_r($_POST);exit;
        $check = array(
            'vEmail' => $this->input->post('vEmail', TRUE),
            'vPassword' => $this->input->post('vPassword', TRUE)
        );
        $admins_arr = $this->admin_model->isValidadmin($check);
        #print_r($admins_arr);exit;
        //Add UserId in Session;       
        if (count($admins_arr) > 0) {
            $signin = array(
                'iAdminId' => $admins_arr[0]['iAdminId'],
                'vEmail' => $this->input->post('vEmail', TRUE),
                'vFirstName' => $admins_arr[0]['vFirstName'],
                'vLastName' => $admins_arr[0]['vLastName'],
                'eStatus' => $admins_arr[0]['eStatus']
            );
            $this->session->set_userdata($signin);
            $this->session->set_flashdata('signin', 'You have been successfully signin !!');
            redirect('admin/users_plan');
        } else {
            $this->session->set_flashdata('signin', 'Email/password not recognised. Please try again.');
            redirect('admin/login');
        }
    }

    function logout(){
        $signin = array(
            'iAdminId' => '',
            'vFirstName' => '',
            'vLastName' => '',
            'vEmail' => '',
            'eStatus' => ''
        );
        $this->session->unset_userdata($signin);
        $this->session->set_flashdata('signout', 'You have been successfully signout !!');
        redirect('admin/login');
        exit;
    }

    function forgot(){
        $this->load->view('admin/forgot');
    }

    function forgot_a() {
        $email = $this->input->post('vEmail', TRUE);
        $res = $this->admin_model->getAdminPassword($email);
        if (count($res) > 0) {
            $this->load->library('email');
            $this->email->from($this->config->config['supportemail'], $this->config->config['supportname']);
            $this->email->to('root.nodes@gmail.com');
            $this->email->subject('Here is your info ' . $name);
            $data['data'] = $res[0];
            $msg = $this->load->view('email/forgot_password',$data,TRUE);
            $this->email->message($msg);
            $this->email->send();
            #echo $this->email->print_debugger();
            $this->session->set_flashdata('signin', 'Your forgot password successfully send to email!!');
            redirect('admin/login');
        } else {
            $this->session->set_flashdata('signin', 'Your email is not match with our database !!');
            redirect('admin/forgot');
        }
        //print_R($res);
        exit;
    }
    
    function users_plan(){
        $this->load->library("pagination");
        //echo "<pre>";
        //print_r($_GET);
        $urisegement = $this->uri->segment(3);
        $dosearch = 'no';
        if(strstr($urisegement,'_')){
            $searcharr = @explode('_',$urisegement);
            $searchkeyword = $searcharr[1];
            $dosearch = 'yes';
            $orderby = 'mr';
            $passorderby = 'dtAddedDate DESC';                
        }else{
            $orderby = $urisegement; 
            if($urisegement == 'mr' || $urisegement == ''){
                $passorderby = 'dtAddedDate DESC';
            }elseif($orderby == 'mu'){
                $passorderby = '';                
            }elseif($orderby == 'ms'){
                $passorderby = '';                
            }elseif($orderby == 'mb'){
                $passorderby = '';                
            }elseif($orderby == 'mp'){
                $passorderby = '';                
            }elseif($orderby == 'mst'){
                $passorderby = 'eStatus ASC';                
            }
        }
        
        $config = array();
        if($dosearch == 'yes'){
            $config["base_url"] = "admin/users_plan/".$urisegement.'/'.$orderby;
            $config["uri_segment"] = '5';
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        }else{
            $config["base_url"] = "admin/users_plan/".$orderby;
            $config["uri_segment"] = '4';
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        }
        $arr = $this->admin_model->user_record_count($searchkeyword);    
        $config["total_rows"] = $arr[0]['tot'];
        $config["per_page"] = '3';
	 
        $this->pagination->initialize($config);
	    
        $data["results"] = $this->admin_model->getusers($config["per_page"], $page,$passorderby,$searchkeyword);
        $data["links"] = $this->pagination->create_links();
        $data['orderby'] = $orderby;
        $data['searchkeyword'] = $searchkeyword;
        /*echo "<pre>";
        print_r($data);exit;*/
        
        $this->load->view('admin/users_plan',$data);       
    }
    
    function search_a(){
        $searchkeyword = $_POST['search'];
        redirect('admin/users_plan/s_'.$searchkeyword);
        exit;        
    }
    
}