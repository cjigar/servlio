<?php

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function signup($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    
    function signup_service($data) {
        $this->db->insert('company_services', $data);
        return $this->db->insert_id();
    }

    function signup_location($data) {
        $this->db->insert('company_location', $data);
        return $this->db->insert_id();
    }
    function getUserPassword($email) {
        $this->db->select('vCompanyName,vEmail,vPassword');
        $this->db->where('vEmail',$email);
        $res = $this->db->get('users');
        return $res->result_array();
    }
    
    function update_location($options) {
        $this->db->where('iCompanyLocationId',$options['iCompanyLocationId']);
        return $this->db->update('company_location', $options);
        
    }
    function getTemplates($option) {
        $this->db->select('*');
        $this->db->where('iUserId',$option['iUserId']);
        $this->db->where('iCompanyServiceId',$option['iCompanyServiceId']);
        $res = $this->db->get('templates');
        return $res->result_array();
    }
    
    
    function updateCardinfo($options) {
        $this->db->where('iUserId',$options['iUserId']);
        return  $this->db->update('cardinfo', $options);
    }
    
    function getUserLocations($iUserId) {
        $this->db->select('*');
        $this->db->where('iUserId',$iUserId);
        $res = $this->db->get('company_location');
        return $res->result_array();
    }
    
    function getService($options) {
        $this->db->select('iServiceId,vService');
        $this->db->where('iCategoryId', $options['iCategoryId'], 'after');
        $query = $this->db->get('services');

        //$html = '<option value="0">All services</option>';
        foreach ($query->result_array() as $row) {
            $items[$row['iStateId']] = $row['vState'];
            $html .= '<option value="' . $row['iServiceId'] . '">' . $row['vService'] . '</option>';
        }
        $html .= '<option value="-1">My service is not listed</option>';
        return $html;
    }

    function GetAutocomplete($options = array()) {

        $this->db->select('vStateCode,vState');
        $this->db->like('vState', $options['keyword'], 'after');
        $this->db->where('vCountryCode', $options['vCountryCode'], 'after');

        $query = $this->db->get('state');
        #echo $this->db->last_query();
        $items = array();
        foreach ($query->result_array() as $row) {
            $items[$row['vStateCode']] = $row['vState'];
        }

        $result = array();
        foreach ($items as $key => $value) {
            array_push($result, array("id" => $key, "label" => $value, "value" => strip_tags($value)));
            if (count($result) > 11)
                break;
        }

        $return = $this->array_to_json($result);
        #echo $this->db->last_query();exit;

        return $return;
    }
    function getCurrency() {
        $this->db->select('*');
        $query = $this->db->get('currencies');

        return $query->result_array();
    }

    function isValiduser($options = array()) {
        $this->db->select('*');
        $this->db->where('vEmail', $options['vEmail']);
        $this->db->where('vPassword', $options['vPassword']);
        $this->db->where('eStatus', 1);
        $query = $this->db->get('users');
        #echo $this->db->last_query();
        return $query->result_array();
    }

    function GetAutocompleteCity($options = array()) {
        $this->db->select('iCityId,vCity');
        $this->db->like('vCity', $options['keyword'], 'after');
        if ($options['vCountryCode'] == 'US') {
            $this->db->where('vStateCode', $options['vStateCode'], 'after');
        }
        $this->db->where('vCountryCode', $options['vCountryCode'], 'after');
        $this->db->group_by('vCity');
        $query = $this->db->get('city');
        //$this->db->last_query();
        $items = array();
        foreach ($query->result_array() as $row) {
            $items[$row['iCityId']] = $row['vCity'];
        }

        $result = array();
        foreach ($items as $key => $value) {
            array_push($result, array("id" => $key, "label" => $value, "value" => strip_tags($value)));
            if (count($result) > 11)
                break;
        }

        $return = $this->array_to_json($result);
        #echo $this->db->last_query();exit;

        return $return;
    }

    function getCountry() {
        $this->db->select('vCountryCode,vCountry');
        $query = $this->db->get('country');
        return $query->result_array();
    }

    function getCategories() {
        $this->db->select('iCategoryId,vCategory');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    function array_to_json($array) {

        if (!is_array($array)) {
            return false;
        }

        $associative = count(array_diff(array_keys($array), array_keys(array_keys($array))));
        if ($associative) {

            $construct = array();
            foreach ($array as $key => $value) {

                // We first copy each key/value pair into a staging array,
                // formatting each key and value properly as we go.
                // Format the key:
                if (is_numeric($key)) {
                    $key = "key_$key";
                }
                $key = "\"" . addslashes($key) . "\"";

                // Format the value:
                if (is_array($value)) {
                    $value = array_to_json($value);
                } else if (!is_numeric($value) || is_string($value)) {
                    $value = "\"" . addslashes($value) . "\"";
                }

                // Add to staging array:
                $construct[] = "$key: $value";
            }

            // Then we collapse the staging array into the JSON form:
            $result = "{ " . implode(", ", $construct) . " }";
        } else { // If the array is a vector (not associative):
            $construct = array();
            foreach ($array as $value) {

                // Format the value:
                if (is_array($value)) {
                    $value = $this->array_to_json($value);
                } else if (!is_numeric($value) || is_string($value)) {
                    $value = "'" . addslashes($value) . "'";
                }

                // Add to staging array:
                $construct[] = $value;
            }

            // Then we collapse the staging array into the JSON form:
            $result = "[ " . implode(", ", $construct) . " ]";
        }

        return $result;
    }

    function checkDuplicate($vEmail) {

        $this->db->where('vEmail', $vEmail);
        $query = $this->db->get('users');
        return $query->num_rows;
    }

    function getUpgrade($iCompanyServiceId,$type="") {
        
        //make query..  from user,services,location,etc..;
       
        /*$sql_query = 'SELECT u.*,s.vService,cur.vCurrencyVal,cur.iCurrencyId,cur.vCurrencySymbol,cs.*,cl.* FROM users AS u 
	LEFT JOIN company_services AS cs ON cs.iUserId = u.iUserId
	LEFT JOIN services AS s ON s.iServiceId = cs.iServiceId
	LEFT JOIN company_location AS cl ON cl.iUserId = u.iUserId
	LEFT JOIN currencies AS cur ON cur.iCurrencyId = cs.iCurrencyId
	
	WHERE u.iUserId =  ' . $iUserId;*/
        
        #echo $this->db->last_query();

        $this->db->start_cache();        
        $iUserId = $this->session->userdata('iUserId');
        
          if($iUserId=="") {
              $ip = $_SERVER["REMOTE_ADDR"];
              $this->db->select('uf.iUserFavoriteId');
              $this->db->join('user_favorites as uf', 'uf.iCompanyServiceId = cs.iCompanyServiceId AND uf.vIP = "'.$ip.'"', 'left');
              $this->db->where('uf.vIP',$ip);
              $return['IP']=$ip;                
          } else {
              $this->db->select('uf.iUserFavoriteId');
              $this->db->join('user_favorites as uf', 'uf.iCompanyServiceId = cs.iCompanyServiceId AND uf.iUserId = "'.$iUserId.'"', 'left');
              $this->db->where('uf.iUserId',$iUserId);
              $return['iUserId']=$iUserId;
          }            

        $this->db->stop_cache();
                
        $this->db->select('u.*,s.vService,cur.vCurrencyVal,cur.iCurrencyId,cur.vCurrencySymbol,
        cs.*,
        cl.*,
        GROUP_CONCAT(tem.vImage) as image_group');
        $this->db->join('users AS u', 'cs.iUserId = u.iUserId', 'left');
        $this->db->join('company_location as cl', 'cl.iUserId = u.iUserId', 'left');
        $this->db->join('currencies as cur', 'cur.iCurrencyId = cs.iCurrencyId', 'left');
        $this->db->join('templates as tem', 'tem.iCompanyServiceId = cs.iCompanyServiceId AND cs.iUserId = u.iUserId', 'left');
        $this->db->join('services AS s', 's.iServiceId = cs.iServiceId', 'left');        
        $this->db->where('u.eStatus =  "1"');
        $this->db->where('cs.iCompanyServiceId',$iCompanyServiceId);
        $this->db->group_by('cs.iCompanyServiceId');
        $query = $this->db->get('company_services as cs');
        
        $db_service = $query->result_array();
        $this->db->flush_cache();
        if($type=="Pro") {
            $this->db->where('cs.iCompanyServiceId',$iCompanyServiceId);
            $query = $this->db->get('company_services as cs');
            $db_user = $query->result_array();
            #print_r($this->db->last_query());
            if($db_user[0]['iUserId']!="") {
                $iUserId = $db_user[0]['iUserId'];
                $this->db->select('u.*,s.vService,cur.vCurrencyVal,cur.iCurrencyId,cur.vCurrencySymbol,
                cs.*,
                cl.*,
                GROUP_CONCAT(tem.vImage) as image_group');
                $this->db->join('users AS u', 'cs.iUserId = u.iUserId', 'left');
                $this->db->join('company_location as cl', 'cl.iUserId = u.iUserId', 'left');
                $this->db->join('currencies as cur', 'cur.iCurrencyId = cs.iCurrencyId', 'left');
                $this->db->join('templates as tem', 'tem.iCompanyServiceId = cs.iCompanyServiceId AND cs.iUserId = u.iUserId', 'left');
                $this->db->join('services AS s', 's.iServiceId = cs.iServiceId', 'left');        
                $this->db->where('u.eStatus =  "1"');
                $this->db->where('cs.iCompanyServiceId !=',$iCompanyServiceId);
                $this->db->where('cs.iUserId',$iUserId);
                $this->db->group_by('cs.iCompanyServiceId');
                $query = $this->db->get('company_services as cs');
                
                $db_other_service = $query->result_array();                
            }
        }
        
        #print_r($db_service);        
        $return['udetail'] = $db_service;
        $return['db_other_service'] = $db_other_service;
        
        return $return;
        
    }
    
    
    function userAccountinfo($iUserId) {
        //make query..  from user,services,location,etc..;
        $sql_query = 'SELECT u.*,s.vService,cur.vCurrencyVal,cur.iCurrencyId,cur.vCurrencySymbol,cs.*,cl.vCountry,cl.vCountryCode,cl.vState,cl.vStateCode,cl.vCity,cl.iCityId 
                    FROM company_services AS cs
                    JOIN company_location AS cl ON cs.iCompanyLocationId = cl.iCompanyLocationId AND cl.iUserId = cs.iUserId
                    JOIN users AS u ON cl.iUserId = u.iUserId
                    LEFT JOIN services AS s ON s.iServiceId = cs.iServiceId
                    LEFT JOIN currencies AS cur ON cur.iCurrencyId = cs.iCurrencyId
                    WHERE u.iUserId =  ' . $iUserId;
        $query = $this->db->query($sql_query);
        return $query->result_array();
    }
    
    
    function editService($iCompanyServiceId) {
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');
        //make query..  from user,services,location,etc..;
        $sql_query = 'SELECT u.*,cs.iCompanyServiceId,s.vService,cur.vCurrencyVal,cur.iCurrencyId,cur.vCurrencySymbol,cs.*,cl.vCountry,cl.vCountryCode,cl.vState,cl.vStateCode,cl.vCity,cl.iCityId 
                    FROM company_services AS cs
                    JOIN company_location AS cl ON cs.iCompanyLocationId = cl.iCompanyLocationId AND cl.iUserId = cs.iUserId
                    JOIN users AS u ON cl.iUserId = u.iUserId
                    LEFT JOIN services AS s ON s.iServiceId = cs.iServiceId
                    LEFT JOIN currencies AS cur ON cur.iCurrencyId = cs.iCurrencyId
                    WHERE u.iUserId =  ' . $iUserId .' AND cs.iCompanyServiceId = '.$iCompanyServiceId;
        $query = $this->db->query($sql_query);
        return $query->result_array();
    }

    function updateUser($options = array()) {
        $this->db->where('iUserId', $options['iUserId']);
        return $this->db->update('users', $options);
    }

    function updateLocation($options = array()) {
        $this->db->where('iUserId', $options['iUserId']);
        //$this->db->where('iCompanyServiceId', $options['iCompanyServiceId']);
        return $this->db->update('company_location', $options);
    }
    
    function updateService($options = array()) {
        $this->db->where('iUserId', $options['iUserId']);
        $this->db->where('iCompanyServiceId', $options['iCompanyServiceId']);
        return $this->db->update('company_services', $options);
    }
    
    function update_service($options = array()) {
        $this->db->where('iUserId', $options['iUserId']);
        return $this->db->update('company_services', $options);
    }

    function insert_template($data) {
        $this->db->insert('templates', $data);
        return $this->db->insert_id();
    }
    
    function update_template($data) {
        $this->db->where('iTemplateId',$data['iTemplateId']);
        $this->db->update('templates', $data);
        return $this->db->insert_id();
    }
    
    function insert_payment($options) {
        $this->db->insert('payment',$options);
        return $this->db->insert_id();
    } 
    
    function insertCardinfo($options) {
        $this->db->insert('cardinfo',$options);
        return $this->db->insert_id();
    }
    function getCardDetail($iUserId) {
        $this->db->select('*');
        $this->db->where('iUserId',$iUserId);
        $res = $this->db->get('cardinfo');
        return $res->result_array();
    }
    function getTransaction($iUserId) {
        $this->db->select('*');
        $this->db->where('iUserId',$iUserId);
        $this->db->order_by('dtAddedDate','DESC');
        $this->db->limit(10);
        $res = $this->db->get('payment');
        return $res->result_array();
    }
    
    function getUsersInfo($iUserId = ''){
        $sql_query = 'SELECT u.*,cl.vCountry,cl.vState,cl.vCity FROM users AS u LEFT JOIN company_location AS cl ON cl.iUserId = u.iUserId where u.iUserId = "'.$iUserId.'" GROUP BY cl.iUserId';
        $query = $this->db->query($sql_query);
        return $query->result_array();
    }
}