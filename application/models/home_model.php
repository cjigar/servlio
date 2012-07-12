<?php

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getService($options) {
        $this->db->select('iServiceId,vService');
        $this->db->where('iCategoryId', $options['iCategoryId'], 'after');
        $query = $this->db->get('services');

        //$html = '<option value="0">All services</option>';
        $html = '<option value="All">All services</option>';
        foreach ($query->result_array() as $row) {
            $items[$row['iStateId']] = $row['vState'];
            $html .= '<option value="' . $row['iServiceId'] . '">' . $row['vService'] . '</option>';
        }
        $html .= '<option value="-1">My service is not listed</option>';
        return $html;
    }
    
    function homepagelisting($from="") {
        $this->load->library('session');
        
        if($from=="favorite") {
            $this->db->start_cache();        
            $iUserId = $this->session->userdata('iUserId');
            
            if($this->uri->segments[2]=="") {
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
            } else {
                  $this->db->select('uf.iUserFavoriteId');
                  $this->db->join('user_favorites as uf', 'uf.iCompanyServiceId = cs.iCompanyServiceId AND uf.iUserId = "'.$this->uri->segments[2].'"', 'left');
                  $return['iUserId']=$this->uri->segments[2];
                  $this->db->where('uf.iUserId',$this->uri->segments[2]);            
            }
            $this->db->stop_cache();
       
        } else {
          $this->db->start_cache();
            #print_r($this->uri->segments);exit;
            if($this->uri->segments[3]=="") {
              if($iUserId=="") {
                  $ip = $_SERVER["REMOTE_ADDR"];
                  $this->db->select('uf.iUserFavoriteId');
                  $this->db->join('user_favorites as uf', 'uf.iCompanyServiceId = cs.iCompanyServiceId AND uf.vIP = "'.$ip.'"', 'left');
                  $return['IP']=$ip;                
              } else {
                  $this->db->select('uf.iUserFavoriteId');
                  $this->db->join('user_favorites as uf', 'uf.iCompanyServiceId = cs.iCompanyServiceId AND uf.iUserId = "'.$iUserId.'"', 'left');
                  $return['iUserId']=$iUserId;
              }            
            } else {
            
                  $this->db->select('uf.iUserFavoriteId');
                  $this->db->join('user_favorites as uf', 'uf.iCompanyServiceId = cs.iCompanyServiceId AND uf.iUserId = "'.$this->uri->segments[2].'"', 'left');
                  $this->db->where('uf.iUserId',$this->uri->segments[3]);            
            }
                      
          if($_REQUEST['search_text']!="") {  
              $this->db->where('u.vCompanyName LIKE  "%'.$_REQUEST['search_text'].'%"');
              $return['search_text'] = $_REQUEST['search_text'];
          }        
          if($_REQUEST['service_id']!="") {
              $this->db->where('cs.iServiceId',$_REQUEST['service_id']);
              $return['service_id'] = $_REQUEST['service_id'];
          }        
          if($_REQUEST['country']!="") {  
              $this->db->where('cl.vCountryCode',$_REQUEST['country']);
              $return['country'] = $_REQUEST['country'];
          }        
          if($_REQUEST['city']!="") {  
              $this->db->where('cl.iCityId',$_REQUEST['city']);
              $return['city'] = $_REQUEST['city'];
          }
          if($_REQUEST['budget_select']!="") {
              $budget_select = @explode("-",$_REQUEST['budget_select']);
              if(count($budget_select)==2) {
                $this->db->where('cs.fPrice BETWEEN '.$budget_select[0].' AND ' . $budget_select[1]);
              } else {
                $this->db->where('cs.fPrice <= '.$budget_select[0]);
              }
              
              $return['budget_select'] = $_REQUEST['budget_select'];
          }        
          $this->db->stop_cache();

        }      
                
        $this->db->select('count(u.iUserId) as tot');
        $this->db->join('users AS u', 'cs.iUserId = u.iUserId', 'left');
        $this->db->join('company_location as cl', 'cl.iCompanyLocationId = cs.iCompanyLocationId', 'left');
        $this->db->join('currencies as cur', 'cur.iCurrencyId = cs.iCurrencyId', 'left');
        $this->db->join('templates as tem', 'tem.iCompanyServiceId = cs.iCompanyServiceId AND cs.iUserId = u.iUserId', 'left');
        $this->db->join('services AS s', 's.iServiceId = cs.iServiceId', 'left');        
        $this->db->where('u.eStatus =  "1"');
        $this->db->group_by('cs.iCompanyServiceId');
        $query = $this->db->get('company_services as cs');
        $tot = $query->result_array();
        $tot_rec_limit = 6;  
        $total_page = ceil(count($tot)/$tot_rec_limit);
        $this->db->last_query()."<hr />";
        
        $excluded_ids = trim($this->input->post('excluded_ids'),",");
        
        $page = $this->input->post('page');
        #echo $page;
        if($page>$total_page) {
          $return['total_rows'] = 0;
          $return['page'] = $page;
          $return['listingdata'] = array();
          return $return;
        }
        
        if(!$page):
          $offset = "0";
        else:
          $offset = $page*$tot_rec_limit;
        endif;
        
                
        //make query..  from user,services,location,etc..;
        $this->db->select('u.*,s.vService,cur.vCurrencyVal,cur.iCurrencyId,cur.vCurrencySymbol,cs.*,cl.*,
        GROUP_CONCAT(tem.vImage) as image_group');
        $this->db->join('users AS u', 'cs.iUserId = u.iUserId', 'left');
        $this->db->join('company_location as cl', 'cl.iUserId = u.iUserId', 'left');
        $this->db->join('currencies as cur', 'cur.iCurrencyId = cs.iCurrencyId', 'left');
        $this->db->join('templates as tem', 'tem.iCompanyServiceId = cs.iCompanyServiceId AND cs.iUserId = u.iUserId', 'left');
        $this->db->join('services AS s', 's.iServiceId = cs.iServiceId', 'left');        
        $this->db->where('u.eStatus =  "1"');
        if(trim($excluded_ids,",")!="")
          $this->db->where('cs.iCompanyServiceId NOT IN ('.$excluded_ids.')');
        
        $this->db->group_by('cs.iCompanyServiceId');
        $this->db->order_by('u.eType DESC');
        $this->db->order_by('RAND()');
        $this->db->limit($tot_rec_limit);
        $query = $this->db->get('company_services as cs');
        #echo $this->db->last_query()."<hr />";
        $db_data = $query->result_array();
        $this->db->flush_cache();        
        foreach($db_data as $data) {
            $ret_arr[] = $data['iCompanyServiceId'];
        }
        
        $return['ids'] = @implode(",",$ret_arr);
        $return['total_rows'] = $tot[0]['tot'];
        $return['page'] = $page;
        $return['listingdata'] = $db_data;
        return $return;
    }
    function GetAutocompleteCity($options = array()) {
        $this->db->select('iCityId,vCity');
        $this->db->like('vCity', $options['keyword'], 'after');

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
    function getPopularServices() {
        $this->db->select('iServiceId,vService');
        $query = $this->db->get('services');
        return $query->result_array();
    }
    function getPopularCountry() {
        $this->db->select('c.vCountryCode,c.vCountry');
        $this->db->join('country c','c.vCountryCode = cl.vCountryCode');
        $this->db->group_by('cl.vCountryCode');
        $this->db->order_by('COUNT(cl.vCountryCode)','DESC');
        $query = $this->db->get('company_location as cl');
        //echo $this->db->last_query();
        return $query->result_array();
    }
    function insertFav($iUserId, $iCompanyServiceId,$from) {
        $this->db->select('iUserFavoriteId');
        if($from=="User")
            $this->db->where('iUserId',$iUserId);
        else
            $this->db->where('vIP',$iUserId);
            
        $this->db->where('iCompanyServiceId',$iCompanyServiceId);
        $query1 = $this->db->get('user_favorites');
        $query = $query1->result_array();
        if($query[0]['iUserFavoriteId']=="") {
        
            if($from=="IP") {
              $data = array(
                 'vIP' => $iUserId ,
                 'iCompanyServiceId' => $iCompanyServiceId,
                 'eFrom' => $from 
              );            
            } else {
              $data = array(
                 'iUserId' => $iUserId ,
                 'iCompanyServiceId' => $iCompanyServiceId,
                 'eFrom' => $from 
              );            
            }

            #print_r($data);exit;
            $this->db->insert('user_favorites', $data);             
        }
        return "Its your Favorite";        
    }
    function topLocation() {
        $this->db->select('*');
        $this->db->where('vCity  != ""');
        $this->db->group_by('iCityId');
        $this->db->order_by('COUNT(iCityId)','DESC');
        $res = $this->db->get('company_location');
        return $res->result_array();
    }
    
    function getcompanyLocations() {
        $this->db->select('vCountryCode');
        $this->db->where('vCountry  != ""');
        $this->db->group_by('vCountryCode');
        $this->db->order_by('COUNT(vCountryCode)','DESC');
        $res = $this->db->get('company_location');
        //echo $this->db->last_query();
        $data = $res->result_array();        
        for($i=0;$i<count($data);$i++) {
            //$row = $data['top_location'][$i]['vCountryCode'];
            $code = $data[$i]['vCountryCode'];
            if($code=='US') {
                $tmprow = $this->findCity($code);
                //$row[$data[$i]['vCountryCode']][] = $tmprow;
                for($k=0;$k<count($tmprow);$k++) {
                    $state_code = $tmprow[$k]['vStateCode'];
                    $row[$data[$i]['vCountryCode']][$state_code][] = $tmprow[$k];
                }
            } else {
                $tmprow = $this->findCity($code);
                $row[$data[$i]['vCountryCode']][] = $tmprow;
            
            }
        }
        
        return $row;
    }
    
    function findCity($code) {
        $this->db->select('*');
        $this->db->where('vCountryCode',$code);
        $this->db->where('vCity != ""');
        $this->db->group_by('iCityId');
        $this->db->order_by('COUNT(iCityId)','DESC');
        $res = $this->db->get('company_location');
        
        return $res->result_array();
    }
    function otherCountry($notin=array()) {
        $this->db->select('*');
        $this->db->where_not_in('vCountryCode',$notin);
        $this->db->order_by('vCountry','ASC');
        $res = $this->db->get('country');
        return $res->result_array();
    }
    
}

/*
        $this->load->library('pagination');
        $config['total_rows'] = $query[0]['tot'];
        $config['per_page'] = 6;
        $config['base_url'] = 'index';
        $this->pagination->initialize($config);
*/