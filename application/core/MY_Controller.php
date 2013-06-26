<?php

class MY_Controller extends CI_Controller
{
    public $view = array();
    
    public function __construct()
    {
        parent::__construct();
        
        $this->view['logged_in'] = $this->User_model->logged_in();
        $this->view['user'] = $this->User_model->get_user();
    }
}