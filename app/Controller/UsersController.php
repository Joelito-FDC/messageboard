<?php

class UsersController extends AppController {   
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function login() {
        $this->layout = '';
    }

    public function registration() {
        $this->layout = '';

        if($this->request->is('post')) {
            $this->User->create();

            if($this->User->save($this->request->data)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'registered'));
            } else {
                $this->Flash->error('Unable to register.');
            }
        }
    }

    public function registered() {
        $this->layout = '';
    }
}