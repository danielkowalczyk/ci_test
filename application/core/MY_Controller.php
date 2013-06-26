<?php

class MY_Controller extends CI_Controller
{
    public $view = array();
    public $logged_in_actions = array();
    public $logged_out_actions = array();
    
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function before()
    {
        $this->view['logged_in'] = $this->User_model->logged_in();
        $this->view['user']  = $this->User_model->get_user();
        
        $action = ($this->uri->segment(2) == '') ? 'index' : $this->uri->segment(2);
        $this->view['title'] = $this->lang->line('page_title_'.
            $this->uri->segment(1).'_'.$action);
        
        // Load header of template
        $this->load->view('templates/header', $this->view);
        
        // Redirect if user must not be logged in to see action
        if ($this->User_model->logged_in()
            && in_array($this->uri->segment(2), $this->logged_out_actions))
        {
            redirect('/', 'header', 301);
        }
        
        // Redirect if user must be logged in to see action
        if (! $this->User_model->logged_in()
            && in_array($this->uri->segment(2), $this->logged_in_actions))
        {
             redirect('/', 'header', 301);
        }
    }
    
    protected function after()
    {
        $this->load->view('templates/footer');
    }
    
    // Reload header if it's variables have been changed in controller
    public function reload_header()
    {
        $this->output->set_output('');
        $this->load->view('templates/header', $this->view);
    }
    
    
    // Remap flow of method executing,
    // added before and after actions
    public function _remap($method, $args)
    {
        // Call before action
        $this->before();
        
        call_user_func_array(array($this, $method), $args);
        
        // Call after action
        $this->after();
    }
}