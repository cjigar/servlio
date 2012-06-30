<?php

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAdminPassword($email) {
        $this->db->select('vEmail,vPassword');
        $this->db->where('vEmail',$email);
        $res = $this->db->get('admin');
        return $res->result_array();
    }

    function isValidadmin($options = array()) {
        $this->db->select('*');
        $this->db->where('vEmail', $options['vEmail']);
        $this->db->where('vPassword', $options['vPassword']);
        $this->db->where('eStatus','Active');
        $query = $this->db->get('admin');
        
        return $query->result_array();
    }

    public function user_record_count($searchkeyword='') {
        $this->db->select('count(iUserId) as tot');
        if($searchkeyword){
            $this->db->where('vCompanyName LIKE "%'.$searchkeyword.'%" ');
        }
        $query = $this->db->get('users');
        return $query->result_array();            
    }
	 
    public function getusers($limit='', $start='',$orderby='',$searchkeyword='') {
        $this->db->limit($limit, $start);
        $this->db->select('*,(SELECT vCountry FROM company_location WHERE iUserId = users.iUserId LIMIT 1) AS country');
        if($searchkeyword){
            $this->db->where('vCompanyName LIKE "%'.$searchkeyword.'%" ');
        }
        if($orderby == ''){
            $this->db->order_by('dtAddedDate DESC');
        }else{
            $this->db->order_by($orderby);
        }
        $query = $this->db->get("users");
	    return $query->result_array();
    }

}