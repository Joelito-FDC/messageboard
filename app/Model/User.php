<?php

class User extends AppModel {
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'email' => array(
            'rule' => 'notBlank'
        ), 
        'password' => array(
            'rule' => 'notBlank'
        ),
        'birthdate' => array(
            'rule' => 'notBlank'
        ), 
        'gender' => array(
            'rule' => 'notBlank'
        ),
        'profile_pic' => array(),
        'last_login_time' => array()
    );


    public function fileUpload($file) {
        if(!empty($file['tmp_name'])) {
            $targetDirectory = "/" . $file['name'];

            if(move_uploaded_file($file['tmp_name'], $targetDirectory)) {
                return true;
            }
        }

        return false;
    }
}