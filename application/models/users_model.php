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
    function getService($options) {
        $this->db->select('iServiceId,vService');
        $this->db->where('iCategoryId', $options['iCategoryId'], 'after');
        $query = $this->db->get('services');
        
        //$html = '<option value="0">All services</option>';
        foreach ($query->result_array() as $row) {
            $items[$row['iStateId']] = $row['vState'];
            $html .= '<option value="'.$row['iServiceId'].'">'.$row['vService'].'</option>';
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
        $this->db->where('vEmail',$options['vEmail']);
        $this->db->where('vPassword',$options['vPassword']);
        $this->db->where('eStatus',1);
        $query = $this->db->get('users');
        #echo $this->db->last_query();
        return $query->result_array();
    }
    function GetAutocompleteCity($options = array()) {
        $this->db->select('iCityId,vCity');
        $this->db->like('vCity', $options['keyword'], 'after');
        if($options['vCountryCode']=='US') {
            $this->db->where('vStateCode', $options['vStateCode'], 'after');
        }
        $this->db->where('vCountryCode', $options['vCountryCode'], 'after');
        $this->db->group_by('vCity');
        $query = $this->db->get('city');
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
    function getUpgrade($iUserId){
        $this->load->library('session');
        $iUserId = $this->session->userdata('iUserId');
        //make query..  from user,services,location,etc..;
        $sql_query = 'SELECT u.*,s.vService,cur.vCurrencySymbol,cs.vDescription,cs.fPrice,cs.vImage,c.vCountry,ci.vCity FROM users AS u 
	LEFT JOIN company_services AS cs ON cs.iUserId = u.iUserId
	LEFT JOIN services AS s ON s.iServiceId = cs.iServiceId
	LEFT JOIN company_location AS cl ON cl.iUserId = u.iUserId
	LEFT JOIN currencies AS cur ON cur.iCurrencyId = cs.iCurrencyId
	LEFT JOIN country AS c ON c.vCountryCode = cl.vCountryCode
	LEFT JOIN city AS ci ON ci.iCityId = cl.iCityId AND ci.vCountryCode = cl.vCountryCode
	WHERE u.iUserId =  '.$iUserId;
        $query = $this->db->query($sql_query);
        return $query->result_array();
        
    }
    function updatePassword($options = array()) {
        $this->db->where('iUserId', $options['iUserId']);
        return $this->db->update('users', $options); 
    }
}