<?php

class User_model extends CI_Model
{
    private $_logged_in = FALSE,
            $_user = NULL;
    
    public $username,
           $email,
           $logins,
           $last_login,
           $password;
    
    public function __construct()
    {
        parent::__construct();
        
        if ( $this->session->userdata('logged_in'))
        {
            $this->_logged_in = TRUE;
            $this->_user = $this->db->get('users', 
                array('id' => $this->session->userdata('user_id'))
            )->row();
        }
    }
    
    public function create_user()
    {
        $this->username   = $this->input->post('username');
        $this->password   = $this->input->post('password');
        $this->email      = $this->input->post('email');
        $this->logins     = 0;
        $this->last_login = 0;
        
        return $this->db->insert('users', $this);
    }
    
    public function login_check($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        $this->_user = $this->db->get('users');
        if ( $this->_user->num_rows() > 0 )
        {
            $this->_user = $this->_user->row();
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function complete_login()
    {
        if ( $this->_user !== NULL )
        {
            $this->db->set('logins', 'logins+1', FALSE); // do not escape this field!
            $this->db->set('last_login', time());
            $this->db->where('id', $this->_user->id);
            $this->db->update('users');
            
            $this->_logged_in = TRUE;
            $this->session->set_userdata(
                array(
                    'logged_in' => TRUE,
                    'user_id' => $this->_user->id
                )
            );
        }
    }
    
    public function logged_in()
    {
        return $this->_logged_in;
    }
    
    public function get_user()
    {
        return $this->_user;
    }
    
    public function logout()
    {
        $this->_logged_in = FALSE;
        $this->_user = NULL;
        $this->session->sess_destroy();
    }
}