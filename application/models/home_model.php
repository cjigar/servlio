<?php

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function homepagelisting() {

        $this->db->select('count(u.iUserId) as tot');
        $this->db->join('users AS u', 'cs.iUserId = u.iUserId', 'left');
        $this->db->join('company_location as cl', 'cl.iUserId = u.iUserId', 'left');
        $this->db->join('currencies as cur', 'cur.iCurrencyId = cs.iCurrencyId', 'left');
        $this->db->join('templates as tem', 'tem.iCompanyServiceId = cs.iCompanyServiceId AND cs.iUserId = u.iUserId', 'left');
        $this->db->join('services AS s', 's.iServiceId = cs.iServiceId', 'left');        
        $this->db->where('u.eStatus =  "1"');
        $this->db->group_by('cs.iCompanyServiceId');
        $query = $this->db->get('company_services as cs');
        $tot = $query->result_array();
        $tot_rec_limit = 6;  
        $total_page = ceil($tot[0]['tot']/$tot_rec_limit);
        
        $page = $this->input->post('page');
        if($page>$total_page) {
          $return['total_rows'] = 0;
          $return['page'] = $page;
          $return['listingdata'] = array();
          return $return;
        }
        if(!$page):
          $offset = 0;
        else:
          $offset = $page*$tot_rec_limit;
        endif;

                
        //make query..  from user,services,location,etc..;
        $this->db->select('u.*,s.vService,cur.vCurrencyVal,cur.iCurrencyId,cur.vCurrencySymbol,
        cs.*,
        cl.vCountry,cl.vState,cl.vCity,
        GROUP_CONCAT(tem.vImage) as image_group');
        $this->db->join('users AS u', 'cs.iUserId = u.iUserId', 'left');
        $this->db->join('company_location as cl', 'cl.iUserId = u.iUserId', 'left');
        $this->db->join('currencies as cur', 'cur.iCurrencyId = cs.iCurrencyId', 'left');
        $this->db->join('templates as tem', 'tem.iCompanyServiceId = cs.iCompanyServiceId AND cs.iUserId = u.iUserId', 'left');
        $this->db->join('services AS s', 's.iServiceId = cs.iServiceId', 'left');        
        $this->db->where('u.eStatus =  "1"');
        $this->db->group_by('cs.iCompanyServiceId');
        $this->db->order_by('u.eType DESC');
        $this->db->order_by('RAND()');
        $this->db->limit($tot_rec_limit,$offset);
        $query = $this->db->get('company_services as cs');
        #echo $this->db->last_query();
        $db_data = $query->result_array();
        
        $return['total_rows'] = $tot[0]['tot'];
        $return['page'] = $page;
        $return['listingdata'] = $db_data;
        return $return;
    }



}

/*
        $this->load->library('pagination');
        $config['total_rows'] = $query[0]['tot'];
        $config['per_page'] = 6;
        $config['base_url'] = 'index';
        $this->pagination->initialize($config);
*/