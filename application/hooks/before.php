<?php
class commonclass {

    private $CI;

    public function __construct()
    {
       $this->CI =& get_instance();

       $this->CI->load->helper('url');
       $this->CI->load->library('session');
    }
    
    public function index()
    {
        $this->CI->db;
        
                
        $iUserId = $this->CI->session->userdata('iUserId');
        
        if(!$iUserId && ($this->CI->uri->uri_string != "users/login" && $this->CI->uri->uri_string != "users/signup" && strstr($this->CI->uri->uri_string,"favorites")!==false)) {
            redirect('users/login', 'location');
        }        
        if($this->CI->uri->segments[1]=="favorites") {
            if($this->CI->uri->segments[2]=="") {
              if($iUserId=="") {
                  $ip = $_SERVER["REMOTE_ADDR"];
                  $this->CI->db->select('count(uf.iUserFavoriteId) as tot');
                  $this->CI->db->where('uf.vIP',$ip);
                  $query = $this->CI->db->get('user_favorites as uf');
                  $tot = $query->result_array();                  
              } else {
                  $this->CI->db->select('count(uf.iUserFavoriteId) as tot');
                  $this->CI->db->where('uf.iUserId',$iUserId);
                  $query = $this->CI->db->get('user_favorites as uf');
                  $tot = $query->result_array();
              }            
            } else {
                  $this->CI->db->select('count(uf.iUserFavoriteId) as tot');
                  $return['iUserId']=$this->CI->uri->segments[2];
                  $this->CI->db->where('uf.iUserId',$this->CI->uri->segments[2]);
                  $query = $this->CI->db->get('user_favorites as uf');
                  $tot = $query->result_array();
            }
        } else {
              if($iUserId=="") {
                  $ip = $_SERVER["REMOTE_ADDR"];
                  $this->CI->db->select('count(uf.iUserFavoriteId) as tot');
                  $this->CI->db->where('uf.vIP',$ip);
                  $query = $this->CI->db->get('user_favorites as uf');
                  $tot = $query->result_array();                  
              } else {
                  $this->CI->db->select('count(uf.iUserFavoriteId) as tot');
                  $this->CI->db->where('uf.iUserId',$iUserId);
                  $query = $this->CI->db->get('user_favorites as uf');
                  $tot = $query->result_array();
              }        
        }
        if($tot[0]['tot']=="" || $tot[0]['tot']=="0") {
            $tot[0]['tot'] = "0";
        }
        
        $this->CI->session->set_userdata('tot_fav',$tot[0]['tot']);
        /*if ( ! $this->CI->session->userdata("logged_in") && $this->CI->uri->uri_string != "/user/login")
        {
            redirect('user/login', 'location');
        }*/
    }
} 

?>