<?php

class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    
        $this->load->model('News_model');
    }
    
    public function index()
    {
        $this->view['news'] = $this->News_model->get_news();
        $this->load->view('news/index', $this->view);
    }
    
    public function view($slug)
    {
        $this->view['news_item'] = $this->News_model->get_news($slug);
        
        if ( empty($this->view['news_item']))
            show_404();
        
        $this->view['title'] = $this->view['news_item']['title'];
        $this->reload_header();
        
        $this->load->view('news/view', $this->view);
    }
    
    public function create()
    {
        $this->load->library('form_validation');
        
        if ( $this->form_validation->run('create_news') === FALSE )
        {
            $this->load->view('news/create', $this->view);
        }
        else
        {
            $this->News_model->set_news();
            $this->load->view('news/success');
        }
    }

}
?>
