<?php

App::uses('Security', 'Utility');

class UsersController extends AppController {   
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    
    public function registration() {        
        $this->layout = '';
        
        if($this->request->is('post')) {
            $this->User->create();

            $pass = $this->request->data['User']['password'];
            $this->request->data['User']['password'] = Security::hash($pass, 'sha1', true);

            if($this->User->save($this->request->data)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'registered'));
            } else {
                $this->Flash->error('Unable to register.', array('clear' => true));
            }
        }
    }

    public function registered() {
        $this->layout = '';
    }

    public function login() {
        $this->layout = '';

        if($this->request->is('post')) {
            $email = $this->request->data['User']['email'];
            $pass = Security::hash($this->request->data['User']['password'], 'sha1', true);

            $auth = $this->User->find('first', array('conditions' => array('User.email' => $email, 'User.password' => $pass)));

            if($auth) {
                $this->User->create();
                $this->User->id = $auth['User']['id'];

                if($this->User->save(array('User' => array('last_login_time' => date('Y-m-d H:i:s'))))) {
                    return $this->redirect(array('controller' => 'users', 'action' => 'account'));
                }
            } 

            $this->Flash->error('Incorrect email or password.', array('clear' => true));   
        }
    }

    public function profile() {
        $this->layout = '';
    }

    public function account() {
        $this->layout = '';

        if($this->request->is('post')) {
            // $this->Info->create();
            $this->Flash->set(print_r($this->UsersInfo), array('clear' => true));
        }
    }
}