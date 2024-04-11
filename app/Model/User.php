<?php

class User extends AppModel {
    public $validate = array(
        'name' => array(
            'rule' => array('lengthBetween', 5, 20),
            'message' => 'Name should be 5 to 20 characters.'
        ),
        'email' => array(
            'rule' => array('email', true),
            'message' => 'Please use a valid email address.'
        ), 
        'password' => array(
            'rule' => 'notBlank'
        ),
        'birthdate' => array(
            'rule' => 'notBlank',
            'message' => 'Please enter your birthdate.'
        ), 
        'gender' => array(
            'rule' => 'notBlank',
            'message' => 'Please choose a gender.'
        ),
        'profile_pic' => array(
            'extension' => array(
                'rule' => array('extension', array('jpg', 'jpeg', 'png', 'gif')),
                'message' => 'File is not supported'    
            ),
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please select a profile picture.'
            )
        ),
        'hobby' => array(
            'rule' => 'notBlank',
            'message' => 'Please enter you hobby.'
        ),
        'last_login_time' => array()
    );


    public function fileUpload($file) {
        if(!empty($file['tmp_name'])) {
            $ext = pathinfo('');
            $type = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '_profile.' . $type;
            $target = $_SERVER['DOCUMENT_ROOT'] . '/messageboard/app/webroot/img/' . $filename;

            if(move_uploaded_file($file['tmp_name'], $target)) {
                return $filename;
            }
        }

        return false;
    }
}