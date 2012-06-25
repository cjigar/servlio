<?php
class Pages extends CI_Controller {
    
    public function index($page = 'aboutus') {
        
        if (!file_exists('application/views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data = array();
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->template->title('Hire PHP Developer', 'Ocean.com');
        $this->template->set('data', $data);
        $this->template->set('metaDesc', 'keyword list');
        $this->template->set('metaKeyword', 'description list');
        
        $this->template->build('pages/' . $page, $data);
        
    }

}
