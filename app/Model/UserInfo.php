<?php

class UserInfo extends AppModel {
    public $validate = array(
        'birthdate' => array(
            'rule' => 'notBlank'
        ),
        'gender' => array(
            'rule' => 'notBlank'
        ),
        'hubby' => array(
            'rule' => 'notBlank'
        )
    );
}