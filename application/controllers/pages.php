<?php

class Pages extends MY_Controller
{
    public function view($page = 'home')
    {
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
            show_404();
        
        $this->header(array('title' => ucfirst($page)));
        $this->load->view('pages/'.$page,  $this->view);
    }
}