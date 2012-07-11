<?php

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');
        $fun = $this->uri->segment(2);
        /*
          $except = array('index', 'login', 'forget');
          if (!in_array($fun, $except)) {
          if (!$iUserId) {
          redirect('/');
          exit;
          }
          } */
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
            $msg = $this->load->view('email/forgot_password', $data, TRUE);
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

    function userExist() {
        $check = array(
            'vEmail' => $this->input->get('email', true)
        );
        echo ($this->users_model->checkEmail($check)) ? false : true;
        exit;
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
            //$this->session->set_flashdata('signin', 'You have been successfully signin !!');
            redirect('users/account');
        } else {
            //$this->session->set_flashdata('signin', 'Email/password not recognised. Please try again.');
            redirect('users/login');
        }
    }

    function profile() {
        //Add UserId in Session;       
        $iCompanyServiceId = $this->uri->segments[3];
        $this->load->model('users_model');
        $data['udetail'] = $this->users_model->getUpgrade($iCompanyServiceId);
        $data['udetail'][0] = $data['udetail']['db_other_service'][0];
        
        $this->load->view('users/profile', $data);
    }

    function profile_pro() {
        
        $iCompanyServiceId = $this->uri->segments[3];
        //find service user id;
        $res =  $this->users_model->getServiceUser($iCompanyServiceId);
        $iUserId = $res[0]['iUserId'];
        
        if (empty($iUserId)) {
            redirect('/');
            exit;
        }
        
        $this->load->model('users_model');
        $options = array(
            'iUserId' => $iUserId,
            'iCompanyServiceId' => $iCompanyServiceId
        );
        $data['udetail'] = $this->users_model->userProfile($options);
        //pr($data);
        $data['gallrey'] = $this->users_model->getTemplates($options);
        $data['db_other_service'] = $this->users_model->userAccountinfo($iUserId);
        $data['location'] = $this->users_model->getUserLocations($iUserId);
        $this->load->view('users/profile_pro', $data);
    }
    
    public function login() {
        $this->load->view('users/login');
    }

    function getService() {
        $options['iCategoryId'] = $this->input->post('iCategoryId', TRUE);
        $html = $this->users_model->getService($options);
        echo $html;
    }

    public function signup() {
        $this->load->helper('country');
        $data['currency'] = $this->users_model->getCurrency();
        $data['categories'] = $this->users_model->getCategories();
        $this->load->view('users/signup', $data);
    }

    function file_upload($type, $file, $addpath) {

        $filename = time() . $file["name"];
        if (isset($addpath) && !empty($addpath)) {
            $path = APPPATH . "theme/uploads/" . $addpath . $filename;
        } else {
            $path = APPPATH . "theme/uploads/" . $filename;
        }

        if (move_uploaded_file($file["tmp_name"], $path)) {
            $this->load->library('resize');

            $images = $this->config->config['images'];

            // *** 1) Initialise / load image
            $resizeObj = new resize($path);

            if ($type == 'Image') {
                foreach ($images as $key => $val) {
                    list($width, $height) = explode("x", $val);
                    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                    $resizeObj->resizeImage($width, $height, 'crop');

                    // *** 3) Save image
                    if (isset($addpath) && !empty($addpath)) {
                        $path = APPPATH . "theme/uploads/" . $addpath . $key . $filename;
                    } else {
                        $path = APPPATH . "theme/uploads/" . $key . $filename;
                    }
                    $resizeObj->saveImage($path, 100);
                }
            } else {

                $width = $this->config->config['logo_image']['width'];
                $height = $this->config->config['logo_image']['height'];
                $resizeObj->resizeImage($width, $height, 'auto');
                //$key = '1_';

                if (isset($addpath) && !empty($addpath)) {
                    $path = APPPATH . "theme/uploads/" . $addpath . $key . $filename;
                } else {
                    $path = APPPATH . "theme/uploads/" . $key . $filename;
                }
                $resizeObj->saveImage($path, 100);
            }
        } else {
            echo "File Not Uploded";
        }
        return $filename;
    }

    /*
      function file_upload($type, $file,$addpath) {

      $filename = time() . $file["name"];
      if(isset($addpath) && !empty($addpath))
      $path = APPPATH . "theme/uploads/".$addpath . $filename;
      else
      $path = APPPATH . "theme/uploads/" . $filename;
      $crop_path = APPPATH . "theme/uploads/crop_" . $filename;
      if (move_uploaded_file($file["tmp_name"], $path)) {
      list($owidth, $oheight, $type11, $attr) = getimagesize($path);
      $ori_height = $this->config->config[$type]['height'];
      $ori_width = $this->config->config[$type]['width'];
      #print_R($this->config->config['small_image']['height']);exit;
      #echo $owidth.'<'.$this->config->config[$type]['height'];
      if($this->config->config[$type]['width']>$this->config->config[$type]['height']) {
      $newheight = ($oheight*$this->config->config[$type]['width'])/$owidth;
      $this->config->config[$type]['height'] = $newheight;
      } else {
      $newwidth = ($owidth*$this->config->config[$type]['height'])/$oheight;
      $this->config->config[$type]['width'] = $newwidth;
      }
      #print_R($this->config->config[$type]);
      $this->config->config[$type]['source_image'] = $path;

      if($this->config->config[$type])
      $name = $this->load->library('image_lib', $this->config->config[$type]);
      if (!$this->image_lib->resize()) {
      echo $this->image_lib->display_errors();
      }
      $this->config->config[$type]['width'] = $ori_width;
      $this->config->config[$type]['height'] = $ori_height;
      $this->config->config[$type]['x_axis'] = 0;
      $this->config->config[$type]['y_axis'] = 0;
      #unset($this->config->config[$type]['width']);
      #unset($this->config->config[$type]['height']);
      #print_R($this->config->config[$type]);
      #$this->config->config[$type]['x_axis']=
      //print_r($this->config->config[$type]);
      // $this->config->config[$type]['new_image'] = "crop_.jpg";
      $this->config->config[$type]['maintain_ratio'] = TRUE;
      $this->load->library('image_lib', $this->config->config[$type]);
      $name = $this->image_lib->initialize($this->config->config[$type]);
      $this->image_lib->crop();

      } else {
      echo "File Not Uploded";
      }
      return $filename;
      }
     */

    public function signup_a() {

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
        if (isset($_FILES['vCompanyLogo']['tmp_name']) && !empty($_FILES['vCompanyLogo']['tmp_name'])) {
            $logoimage = $this->file_upload('LogoImage', $_FILES['vCompanyLogo']);
        } else {
            $logoimage = '';
        }

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
        // Inesrt Locatin
        $location = array(
            'iUserId' => $iUserId,
            'vCountryCode' => $this->input->post('vCountryCode', TRUE),
            'vCountry' => $this->input->post('vCountry', TRUE),
            'vStateCode' => '',
            'vState' => '',
            'iCityId' => $this->input->post('iCityId', TRUE),
            'vCity' => $this->input->post('vCity', TRUE),
        );

        if ($this->input->post('vCountryCode', TRUE) == 'US') {
            $location['vStateCode'] = $this->input->post('vStateCode', TRUE);
            $location['vState'] = $this->input->post('vState', TRUE);
        }
        $iCompanyLocationId = $this->users_model->signup_location($location);
        //Insert into  company_services;
        if (isset($_FILES['vImage']['tmp_name']) && !empty($_FILES['vImage']['tmp_name'])) {

            $serviceimage = $this->file_upload('Image', $_FILES['vImage']);
        } else {
            $serviceimage = '';
        }

        $vTmpImage = $this->input->post('vTmpImage', TRUE);
        unlink(APPPATH . 'theme/uploads/tmp/' . $vTmpImage);
        $services = array(
            'iUserId' => $iUserId,
            'iCompanyLocationId' => $iCompanyLocationId,
            'iServiceId' => $this->input->post('iServiceId', TRUE),
            'vServiceName' => $this->input->post('vServiceName', TRUE),
            'iCategoryId' => $this->input->post('iCategoryId', TRUE),
            'iCurrencyId' => $this->input->post('iCurrencyId', TRUE),
            'fPrice' => $this->input->post('fPrice', TRUE),
            'vImage' => $serviceimage,
            'vDescription' => $this->input->post('vDescription', TRUE)
        );
        $iCompanyServiceId = $this->users_model->signup_service($services);


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
        $data['basic'] = $this->users_model->userAccountinfo($iUserId);
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
        if (strlen($term) < 1)
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
        $data['basic'] = $this->users_model->userAccountinfo($iUserId);
        $data['basic'] = $data['basic'][0];
        //print_R($data['basic']);
        $this->load->view('users/publish', $data);
    }

    function publish_a() {
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
            //$this->session->set_flashdata('signin', 'You have been successfully signin !!');
            redirect('users/account');
        } else {
            //$this->session->set_flashdata('signin', 'Password not updated successfully !!. Please try again.');
            redirect('/');
        }
    }

    function account() {
        $iUserId = $this->session->userdata('iUserId');
        $data['account'] = $this->users_model->userAccountinfo($iUserId);
        $this->load->view('users/account', $data);
    }

    function signout() {
        $this->load->library('session');
        $signin = $this->session->all_userdata();
        $this->session->unset_userdata($signin);
        $this->session->set_flashdata('signout', 'You have been successfully signout !!');
        redirect('/');
    }

    function settings() {

        $this->load->helper('country');
        $iUserId = $this->session->userdata('iUserId');

        $data = $this->users_model->userAccountinfo($iUserId);

        $data['basic'] = $data['udetail'][0];
        //get Locations

        if (empty($iUserId)) {
            redirect('/');
            exit;
        }

        $eType = $this->session->userdata('eType');

        if ($eType == 'Pro')
            $data['basic'] = $this->users_model->userSetting($iUserId);
        else
            $data['basic'] = $this->users_model->userAccountinfo($iUserId);

        $data['basic'] = $data['basic'][0];
        //get Locations 

        $data['location'] = $this->users_model->getUserLocations($iUserId);

        #print_R($data);exit;

        $data['currency'] = $this->users_model->getCurrency();

        $type = $this->session->userdata('eType');
        // Card info...
        $cardinfo = $this->users_model->getCardDetail($iUserId);
        $data['cardinfo'] = $cardinfo[0];
        //get All Transaction info
        #print_r($data);exit;

        $transinfo = $this->users_model->getTransaction($iUserId);
        $data['transinfo'] = $transinfo;

        //pr($data);

        if ($type == 'Pro')
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
            $logoimage = $this->file_upload('LogoImage', $_FILES['vCompanyLogo']);
            $user['vCompanyLogo'] = $logoimage;
            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldCompanyLogo', TRUE));
        }
        $this->users_model->updateUser($user);
        //Check here if location is not then Pro member will enter 3 Location..

        foreach ($_POST['Location'] as $row) {

            $location = array(
                'iCompanyLocationId' => $row['iCompanyLocationId'],
                'vCountryCode' => $row['vCountryCode'],
                'iUserId' => $iUserId,
                'vCountry' => $row['vCountry'],
                'vStateCode' => $row['vStateCode'],
                'vState' => $row['vState'],
                'iCityId' => $row['iCityId'],
                'vCity' => $row['vCity'],
            );
            
            
            if (isset($row['vCity']) && !empty($row['vCity'])) {
                if (isset($row['iCompanyLocationId']) && !empty($row['iCompanyLocationId'])) {
                    $this->users_model->update_location($location);
                } else {
                    $this->users_model->signup_location($location);
                }
            }
        }
        //update currency.
        $service = array(
            'iUserId' => $iUserId,
            'iCurrencyId' => $this->input->post('iCurrencyId', TRUE)
        );
        $this->users_model->update_service($service);

        //update Cardinfo

        $detail = array(
            'iUserId' => $iUserId,
            'vCardNumber' => $this->input->post('vCardNumber', TRUE),
            'vExpireMonth' => $this->input->post('vExpireMonth', TRUE),
            'vExpireYear' => $this->input->post('vExpireYear', TRUE),
            'vCvv' => $this->input->post('vCvv', TRUE),
        );
        $info = $this->users_model->updateCardinfo($detail);

        $this->session->set_flashdata('signin', 'Settings updated successfully !!');
        redirect('users/account');
    }

    function settings_a() {

        $iUserId = $this->session->userdata('iUserId');
        #print_r($_POST);exit;
        $user = array(
            'iUserId' => $iUserId,
            'vAbout' => $this->input->post('vAbout', TRUE),
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
            $logoimage = $this->file_upload('LogoImage', $_FILES['vCompanyLogo']);
            $user['vCompanyLogo'] = $logoimage;
            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldCompanyLogo', TRUE));
        }

        $this->users_model->updateUser($user);

        $location = array(
            'iCompanyLocationId' => $this->input->post('iCompanyLocationId', true),
            'vCountryCode' => $this->input->post('vCountryCode', true),
            'vCountry' => $this->input->post('vCountry', true),
            'vStateCode' => $this->input->post('vStateCode', true),
            'vState' => $this->input->post('vState', true),
            'iCityId' => $this->input->post('iCityId', true),
            'vCity' => $this->input->post('vCity', true),
        );

        $this->users_model->update_location($location);
        $this->session->set_flashdata('signin', 'Settings updated successfully !!');
        redirect('users/account');
    }

    function edit_service($iCompanyServiceId) {
        $iUserId = $this->session->userdata('iUserId');

        $data['basic'] = $this->users_model->editService($iCompanyServiceId);
        $data['location'] = $this->users_model->getUserLocations($iUserId);
        $data['basic'] = $data['basic'][0];
        

        $template = array(
            'iUserId' => $iUserId,
            'iCompanyServiceId' => $iCompanyServiceId
        );
        $data['gallery'] = $this->users_model->getTemplates($template);
        $data['categories'] = $this->users_model->getCategories();
        
        
        
        $this->load->view('users/edit_service', $data);
    }

    function edit_service_a() {
        $iUserId = $this->session->userdata('iUserId');
        $service = array(
            'iUserId' => $this->session->userdata('iUserId'),
            'iCompanyLocationId' => $this->input->post('iCompanyLocationId', TRUE),
            'iCompanyServiceId' => $this->input->post('iCompanyServiceId', TRUE),
            'iCategoryId' => $this->input->post('iCategoryId', TRUE),
            'iServiceId' => $this->input->post('iServiceId', TRUE),
            'vServiceName' => $this->input->post('vServiceName', TRUE),
            'vDescription' => $this->input->post('vDescription', TRUE),
            'fPrice' => $this->input->post('fPrice', TRUE)
        );

        if (isset($_FILES['vImage']['tmp_name']) && !empty($_FILES['vImage']['tmp_name'])) {
            //Image croping;
            $image = $this->file_upload('Image', $_FILES['vImage']);
            $service['vImage'] = $image;
            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldImage', TRUE));
        }
        
        $update = $this->users_model->updateService($service);
        $iCompanyServiceId = $this->input->post('iCompanyServiceId', TRUE);

        //Update Images....
        if (isset($_FILES['vGalleryImage']['tmp_name']) && !empty($_FILES['vGalleryImage']['tmp_name'])) {

            $vGalleryImage = $this->file_upload('Image', $_FILES['vGalleryImage']);

            //Insert OR Update;;;
            $iTemplateId = $this->input->post('iTemplateId', true);
            if (isset($iTemplateId) && !empty($iTemplateId)) {
                //Update ;
                $templates = array(
                    'iTemplateId' => $iTemplateId,
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->update_template($templates);
            } else {
                //Insert ;
                $templates = array(
                    'iCompanyServiceId' => $iCompanyServiceId,
                    'iUserId' => $iUserId,
                    'eStatus' => '1',
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->insert_template($templates);
            }

            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldGalleryImage', TRUE));
        }


        if (isset($_FILES['vGalleryImage1']['tmp_name']) && !empty($_FILES['vGalleryImage1']['tmp_name'])) {

            $vGalleryImage = $this->file_upload('Image', $_FILES['vGalleryImage1']);

            //Insert OR Update;;;
            $iTemplateId = $this->input->post('iTemplateId1', true);
            if (isset($iTemplateId) && !empty($iTemplateId)) {
                //Update ;
                $templates = array(
                    'iTemplateId' => $iTemplateId,
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->update_template($templates);
            } else {
                //Insert ;
                $templates = array(
                    'iCompanyServiceId' => $iCompanyServiceId,
                    'iUserId' => $iUserId,
                    'eStatus' => '1',
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->insert_template($templates);
            }

            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldGalleryImage1', TRUE));
        }

        if (isset($_FILES['vGalleryImage2']['tmp_name']) && !empty($_FILES['vGalleryImage2']['tmp_name'])) {

            $vGalleryImage = $this->file_upload('Image', $_FILES['vGalleryImage2']);

            //Insert OR Update;;;
            $iTemplateId = $this->input->post('iTemplateId2', true);
            if (isset($iTemplateId) && !empty($iTemplateId)) {
                //Update ;
                $templates = array(
                    'iTemplateId' => $iTemplateId,
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->update_template($templates);
            } else {
                //Insert ;
                $templates = array(
                    'iCompanyServiceId' => $iCompanyServiceId,
                    'iUserId' => $iUserId,
                    'eStatus' => '1',
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->insert_template($templates);
            }

            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldGalleryImage2', TRUE));
        }

        if (isset($_FILES['vGalleryImage3']['tmp_name']) && !empty($_FILES['vGalleryImage3']['tmp_name'])) {

            $vGalleryImage = $this->file_upload('Image', $_FILES['vGalleryImage3']);

            //Insert OR Update;;;
            $iTemplateId = $this->input->post('iTemplateId3', true);
            if (isset($iTemplateId) && !empty($iTemplateId)) {
                //Update ;
                $templates = array(
                    'iTemplateId' => $iTemplateId,
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->update_template($templates);
            } else {
                //Insert ;
                $templates = array(
                    'iCompanyServiceId' => $iCompanyServiceId,
                    'iUserId' => $iUserId,
                    'eStatus' => '1',
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->insert_template($templates);
            }

            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldGalleryImage3', TRUE));
        }


        if (isset($_FILES['vGalleryImage4']['tmp_name']) && !empty($_FILES['vGalleryImage4']['tmp_name'])) {

            $vGalleryImage = $this->file_upload('Image', $_FILES['vGalleryImage4']);

            //Insert OR Update;;;
            $iTemplateId = $this->input->post('iTemplateId4', true);
            if (isset($iTemplateId) && !empty($iTemplateId)) {
                //Update ;
                $templates = array(
                    'iTemplateId' => $iTemplateId,
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->update_template($templates);
            } else {
                //Insert ;
                $templates = array(
                    'iCompanyServiceId' => $iCompanyServiceId,
                    'iUserId' => $iUserId,
                    'eStatus' => '1',
                    'vImage' => $vGalleryImage
                );
                $iInsertId = $this->users_model->insert_template($templates);
            }
            //unlink old;
            unlink(APPPATH . 'theme/uploads/' . $this->input->post('vOldGalleryImage4', TRUE));
        }
        //$this->session->set_flashdata('signin', 'Service edited successfully !!');
        redirect('users/account');
        exit;
    }

    function publish_pro() {

        $iUserId = $this->session->userdata('iUserId');
        $data['basic'] = $this->users_model->userAccountinfo($iUserId);
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
                if (isset($vPassword) && !empty($vPassword)) {
                    $users['vPassword'] = $this->input->post('vPassword', TRUE);
                }
                $this->users_model->updateUser($users);
                //Update in session;
                //insert cardinfo;
                $detail = array(
                    'iUserId' => $this->session->userdata('iUserId'),
                    'vCardNumber' => $this->input->post('cardnumber', TRUE),
                    'vExpireMonth' => $this->input->post('cardexpirymonth', TRUE),
                    'vExpireYear' => $this->input->post('cardexpiryyear', TRUE),
                    'vCvv' => $this->input->post('cardcvc', TRUE),
                );
                $info = $this->users_model->insertCardinfo($detail);

                $this->session->set_userdata('eType', 'Pro');
                //Mail to member...

                $this->load->library('email');
                $this->email->from($this->config->config['supportemail'], $this->config->config['supportname']);
                $this->email->to('root.nodes@gmail.com');
                $this->email->subject('Welcome to Servlio!');
                $data['vCompanyName'] = $this->session->userdata('vCompanyName');
                $msg = $this->load->view('email/email_pro_signup', $data, TRUE);
                $this->email->message($msg);
                $this->email->send();


                $userinfo = $this->users_model->getUsersInfo($this->session->userdata('iUserId'));

                $this->email->from($this->config->config['supportemail'], $this->config->config['supportname']);
                $this->email->to('root.nodes@gmail.com');
                $this->email->subject('Servlio monthly invoice');
                $data['vCompanyName'] = $this->session->userdata('vCompanyName');
                $data['userinfo'] = $userinfo;
                $data['billingdate'] = date('M j, Y');
                $newdate = strtotime(date("Y-m-d", strtotime($todayDate)) . "+1 month");
                $data['aftermonth'] = date('M j, Y', $newdate);
                $data['userinfo'] = $userinfo[0];
                $msg = $this->load->view('email/email_pro_signup', $data, TRUE);
                $this->email->message($msg);
                $this->email->send();


                //$this->session->set_flashdata('signin', 'Your payment have been done successfuly !!');
                redirect('users/account');
            } else {
                //throw new Exception("The Stripe Token was not generated correctly");
                //$this->session->set_flashdata('signin', 'Your payment have problem ! Please try after some time. ');
                redirect('users/account');
            }
        } catch (Exception $e) {
            // $this->session->set_flashdata('signin', 'Your payment have problem ! Please try after some time.');
            redirect('users/account');
            //echo $error = $e->getMessage();
        }
        exit;
    }

    function new_service() {

        $iUserId = $this->session->userdata('iUserId');
        if(empty($iUserId)) {
            redirect("/");
            exit;
        }
        $type = $this->session->userdata('eType');
        $data['basic'] = $this->users_model->userAccountinfo($iUserId);
        $data['categories'] = $this->users_model->getCategories();
        $data['location'] = $this->users_model->getUserLocations($iUserId);
        $data['basic'] = $data['basic'][0];
        $this->load->view('users/new_service', $data);
    }

    function new_service_a() {
        #echo "<pre>";print_r($_FILES);print_r($_POST);exit; 

        $iUserId = $this->session->userdata('iUserId');

        $serviceimage = $this->file_upload('Image', $_FILES['vImage']);
        $service_id = $this->input->post('iServiceId', TRUE);
        $services = array(
            'iUserId' => $iUserId,
            'iServiceId' => ($service_id > 0) ? $service_id : '',
            'iCompanyLocationId' => $this->input->post('iCompanyLocationId', TRUE),
            'vServiceName' => $this->input->post('vServiceName', TRUE),
            'iCategoryId' => $this->input->post('iCategoryId', TRUE),
            'iCurrencyId' => $this->input->post('iCurrencyId', TRUE),
            'fPrice' => $this->input->post('fPrice', TRUE),
            'vImage' => $serviceimage,
            'vDescription' => $this->input->post('vDescription', TRUE)
        );
        $iCompanyServiceId = $this->users_model->signup_service($services);

        if (isset($_FILES['vGalleryImage']['tmp_name']) && !empty($_FILES['vGalleryImage']['tmp_name'])) {
            $vGalleryImage = $this->file_upload('Image', $_FILES['vGalleryImage']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (isset($_FILES['vGalleryImage1']['tmp_name']) && !empty($_FILES['vGalleryImage1']['tmp_name'])) {
            $vGalleryImage1 = $this->file_upload('Image', $_FILES['vGalleryImage1']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage1
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (isset($_FILES['vGalleryImage2']['tmp_name']) && !empty($_FILES['vGalleryImage2']['tmp_name'])) {
            $vGalleryImage2 = $this->file_upload('Image', $_FILES['vGalleryImage2']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage2
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (isset($_FILES['vGalleryImage3']['tmp_name']) && !empty($_FILES['vGalleryImage3']['tmp_name'])) {
            $vGalleryImage3 = $this->file_upload('Image', $_FILES['vGalleryImage3']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage3
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }

        if (isset($_FILES['vGalleryImage4']['tmp_name']) && !empty($_FILES['vGalleryImage4']['tmp_name'])) {
            $vGalleryImage4 = $this->file_upload('Image', $_FILES['vGalleryImage4']);
            $templates = array(
                'iCompanyServiceId' => $iCompanyServiceId,
                'iUserId' => $iUserId,
                'eStatus' => '1',
                'vImage' => $vGalleryImage4
            );
            $iInsertId = $this->users_model->insert_template($templates);
        }
        //$this->session->set_flashdata('signin', 'Your Service Added Successfully !!');
        redirect('users/account');
        exit;
    }

    function cancelaccount() {
        echo "Under construction";
        exit;
    }

    function upload() {
        #print_r($_FILES);exit;
        foreach ($_FILES['vImage'] as $key => $val) {
            $_FILES['vImage'][$key] = $val[0];
        }
        #print_r($_FILES['vImage']);exit;
        $serviceimage = $this->file_upload('Image', $_FILES['vImage'], $addpath = 'tmp/');
        echo $serviceimage;
        exit;
    }

}