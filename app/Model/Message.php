<?php

class Message extends AppModel {
    public $validate = array(
        'user_id' => array(),
        'recepient_id' => array(),
        'message' => array(
            'rule' => 'notBlank'
        )
    );
}