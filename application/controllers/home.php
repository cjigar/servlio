<?php

class Home extends CI_Controller {
    
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
        $sidebars =  array();
        //$this->template->set('sidebars', $sidebars);
        //$this->template->set_partial('sidebar', 'posts/sidebar')->set_layout('default');
        $this->template->build('home/index');
    }
}