<?php

$config = array(
    'signup' => array(
        array('field' => 'username',
              'label' => 'lang:form_field_username',
              'rules' => 'trim|required|min_length[3]|max_length[50]|is_unique[users.username]'),
        array('field' => 'password',
              'label' => 'lang:form_field_password',
              'rules' => 'required|matches[passconf||md5'),
        array('field' => 'passconf',
              'label' => 'lang:form_field_passconf',
              'rules' => 'required'),
        array('field' => 'email',
              'label' => 'lang:form_field_email',
              'rules' => 'trim|required|max_length[100]|valid_email|is_unique[users.email]')
    ),
    
    'sign_in' => array(
        array('field' => 'username',
              'label' => 'lang:form_field_username',
              'rules' => 'trim|required'),
        array('field' => 'password',
              'label' => 'lang:form_field_password',
              'rules' => 'required|callback_check_login[username]')
    )
);