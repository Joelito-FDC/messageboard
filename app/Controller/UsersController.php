<?php

App::uses('Security', 'Utility');

class UsersController extends AppController {   
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    
    public function login() {
        $this->layout = '';

        if($this->request->is('post')) {
            $email = $this->request->data['User']['email'];
            $pass = Security::hash($this->request->data['User']['password'], 'sha1', true);

            $auth = $this->User->find('first', array('conditions' => array('User.email' => $email, 'User.password' => $pass)));

            if(!$auth) {
                $this->Flash->set('Authentication unsuccessful.', array('clear' => true));
            } else {
                $this->Flash->set('Authentication success.', array('clear' => true));
            }            
        }
    }
    
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
}