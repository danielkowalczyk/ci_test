<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
    public $logged_in_actions = array('logout');
    public $logged_out_actions = array('signup', 'sign_in');
    
    public function signup()
    {
        $this->load->library('form_validation');

        if ( $this->form_validation->run('signup') == FALSE )
        {    
            $this->load->view('user/signup');            
        }
        else
        {
            $this->User_model->create_user();
            $this->load->view('user/signup_success');
        }
    }
    
    public function sign_in()
    {
        $this->load->library('form_validation');

        if ( $this->form_validation->run('sign_in') == FALSE )
        {
            $this->load->view('user/sign_in');
        }
        else
        {
            $this->User_model->complete_login();
            $this->load->view('user/sign_in_success');
        }
    }
    
    public function check_login($password, $username_field_name)
    {
        $username = $this->input->post($username_field_name);
        
        if ( $this->User_model->login_check($username, $password))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_login', $this->lang->line('sign_in_error'));
            return FALSE;
        }
    }
    
    public function logout()
    {
        if ( $this->User_model->logged_in())
        {
            $this->User_model->logout();
        }
        
        redirect('/', 'location', 301);
    }
}

?>