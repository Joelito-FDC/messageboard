<?php

class MessagesController extends AppController {
    public $uses = array('User');

    public function index() {
        $this->layout = '';

        $this->set('people', $this->User->find('all'));
    }


    public function threads() {
        $this->layout = '';

        if($this->request->is('post')) {
            $this->Message->create();


        }
    }

    public function new() {
        $this->layout = '';

        $this->set('recipient', $this->User->find('all'));
    }
}