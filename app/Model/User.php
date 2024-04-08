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
        'profile_pic' => array(
            // 'rule' => 'notBlank'
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