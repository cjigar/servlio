<?php

class Users extends CI_Controller {

    public function index() {

        $data = array();
        /*
          $this->template->title('Hire PHP Developer', 'TechRevolutionWeb');
          $this->template->set('data', $data);
          $this->template->set('metaDesc', 'keyword list');
          $this->template->set('metaKeyword', 'description list');
         * 
         */

        /* Build sidebar menu */
        //$sidebars = $this->Post->top10('10');
        $sidebars = array();
        //$this->template->set('sidebars', $sidebars);
        //$this->template->set_partial('sidebar', 'posts/sidebar')->set_layout('default');
        $this->template->build('home/index');
    }

    function signin_a() {
        $this->load->model('users_model');
        //echo $this->input->post('vEmail', TRUE);
        $check = array(
            'vEmail' => $this->input->post('vEmail', TRUE),
            'vPassword' => $this->input->post('vPassword', TRUE)
        );
        $users = $this->users_model->isValiduser($check);
        //print_R($users);exit;
        //Add UserId in Session;       
        $this->load->library('session');
        if (count($users)>0) {
            $signin = array(
                'vFirstName' => $users[0]['vFirstName'],
                'vLastName' => $users[0]['vLastName'],
                'vEmail' => $this->input->post('vEmail', TRUE),
                'vCompanyName' => $users[0]['vCompanyName'],
                'vCompanyLogo' => $users[0]['vCompanyLogo'],
                'eStatus' => 1
            );
            $this->session->set_userdata($signin);
            $this->session->set_flashdata('signin', 'You have been successfully signin !!');
            redirect('users/profile');
        } else {
            $this->session->set_flashdata('signin', 'Email/password not recognised. Please try again.');
            redirect('users/login');
        }
    }
    function profile() {
        //Add UserId in Session;       
        $this->load->library('session'); 
        $this->load->view('users/profile');
    }
    public function login() {
        //$data = array();
        //$this->template->build('users/login');
        $this->load->view('users/login');
    }

    function getService() {
        $this->load->model('users_model');
        $options['iCategoryId'] = $this->input->post('iCategoryId', TRUE);
        $html = $this->users_model->getService($options);
        echo $html;
    }

    public function signup() {
        $this->load->helper('country');
        $this->load->model('users_model');
        $data['currency'] = $this->users_model->getCurrency();
        $data['categories'] = $this->users_model->getCategories();
        $this->load->view('users/signup', $data);
    }

    function file_upload($type, $file) {
        $filename = time() . $file["name"];
        $path = APPPATH . "theme/uploads/" . $filename;
        if (move_uploaded_file($file["tmp_name"], $path)) {
            $this->config->config[$type]['source_image'] = $path;
            $name = $this->load->library('image_lib', $this->config->config[$type]);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
        } else {
            echo "File Not Uploded";
        }
        return $filename;
    }

    public function signup_a() {

        $this->load->model('users_model');
        //Image croping;
        $logoimage = $this->file_upload('logo_image', $_FILES['vCompanyLogo']);

        //insert into users;
        $userdata = array(
            'vCompanyName' => $this->input->post('vCompanyName', TRUE),
            'vCompanyLogo' => $logoimage,
            'vEmail' => $this->input->post('vEmail', TRUE),
            'vWebSite' => $this->input->post('vWebSite', TRUE),
            'vTwitter' => $this->input->post('vTwitter', TRUE),
            'vPhone' => $this->input->post('vPhone', TRUE),
        );
        $iUserId = $this->users_model->signup($userdata);

        //Insert into  company_services;
        $serviceimage = $this->file_upload('small_image', $_FILES['vImage']);
        $services = array(
            'iUserId' => $iUserId,
            'iServiceId' => $this->input->post('iServiceId', TRUE),
            'vServiceName' => $this->input->post('vServiceName', TRUE),
            'iCategoryId' => $this->input->post('iCategoryId', TRUE),
            'iCurrencyId' => $this->input->post('iCurrencyId', TRUE),
            'fPrice' => $this->input->post('fPrice', TRUE),
            'vImage' => $serviceimage,
            'vDescription' => $this->input->post('vDescription', TRUE)
        );
        $iCompanyServiceId = $this->users_model->signup_service($services);

        $location = array(
            'iUserId' => $iUserId,
            'iCompanyServiceId' => $iCompanyServiceId,
            'iCountryId' => $this->input->post('iCountryId', TRUE),
            'iStateId' => $this->input->post('iStateId', TRUE),
            'iCityId' => $this->input->post('iCityId', TRUE),
        );
        $iCompanyLocationId = $this->users_model->signup_location($location);

        //Add UserId in Session;
        $this->load->library('session');

        $signin = array(
            'iUserId' => $iUserId,
            'vEmail' => $this->input->post('vEmail', TRUE),
            'vCompanyName' => $this->input->post('vCompanyName', TRUE),
            'eStatus' => 1
        );
        $this->session->set_userdata($signin);
        redirect('users/upgrade');
        exit;
    }

    function upgrade() {
        $this->load->model('users_model');
        $data = $this->users_model->getUpgrade();
        $this->load->view('users/upgrade', $data);
    }

    function state_suggestions() {
        $this->load->model('users_model');
        $term = $this->input->get('term', TRUE);
        $vCountryCode = $this->input->get('vCountryCode', TRUE);

        if (strlen($term) < 2)
            return;

        $keywords = $this->users_model->GetAutocomplete(array('keyword' => $term, 'vCountryCode' => $vCountryCode));

        echo $keywords;
    }

    function city_suggestions() {
        $this->load->model('users_model');
        $term = $this->input->get('term', TRUE);
        $vStateCode = $this->input->get('vStateCode', TRUE);
        $vCountryCode = $this->input->get('vCountryCode', TRUE);

        if (strlen($term) < 2)
            break;

        $keywords = $this->users_model->GetAutocompleteCity(array('keyword' => $term, 'vStateCode' => $vStateCode, 'vCountryCode' => $vCountryCode));

        echo $keywords;
    }

    function uploadfile() {
        if ( ! empty($_FILES)) {
                $tempFile = $_FILES['vImage']['tmp_name'];
                $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/SVN/handinhand/assets/images/galleries';
                $targetPath = "C:\wamp\www\servlio\application\theme\uploads\tmp";
                $targetFile =  str_replace('//','/',$targetPath) . $_FILES['file_input']['name'];
                move_uploaded_file($tempFile,$targetFile);
            
            }
            
        echo '1';        
    }   

}