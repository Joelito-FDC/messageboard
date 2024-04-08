<?php

App::uses('Security', 'Utility');

class UsersController extends AppController {   
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    

    public function registration() {        
        $this->layout = '';
        
        if($this->request->is('post')) {
            $this->User->create();

            if($this->User->find('first', array('conditions' => array('email' => $this->request->data['User']['email'])))) {
                $this->Flash->error('Email already registered.', array('clear' => true));

                return;
            }

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

        if(!empty($this->Session->read('User.id'))) return $this->redirect(array('controller' => 'users', 'action' => 'profile'));

        if($this->request->is('post')) {
            $email = $this->request->data['User']['email'];
            $pass = Security::hash($this->request->data['User']['password'], 'sha1', true);

            $auth = $this->User->find('first', array('conditions' => array('User.email' => $email, 'User.password' => $pass)));

            if($auth) {
                $this->User->create();
                $this->User->id = $auth['User']['id'];

                if($this->User->save(array('User' => array('last_login_time' => date('Y-m-d H:i:s'))))) {
                    $this->Session->write('User.id', $auth['User']['id']);
                    $this->Session->write('User.name', $auth['User']['name']);
                    $this->Session->write('User.profile', $auth['User']['profile_pic']); 
                    
                    return $this->redirect(array('controller' => 'users', 'action' => 'account'));
                }
            } 

            $this->Flash->error('Incorrect email or password.', array('clear' => true));   
        }
    }


    public function profile() {
        $this->layout = ''; 

        if(empty($this->Session->read('User.id'))) return $this->redirect(array('controller' => 'users', 'action' => 'login'));

        $this->set('accountInfo', $this->User->find('first', array('conditions' => array('User.id' => $this->Session->read('User.id')))));
    }


    public function account() {
        $this->layout = '';
        
        if(empty($this->Session->read('User.id'))) return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        
        $this->set('id', $this->Session->read('User.id'));
        $this->set('accountInfo', $this->User->find('first', array('conditions' => array('User.id' => $this->Session->read('User.id')))));

        if($this->request->is('post')) {
            $this->User->create();

            $this->User->id = $this->Session->read('User.id');
            $image = $this->request->data['User']['profile_pic'];
            $filename = null;

            if($this->request->data['User']['profile_pic']['size'] > 0 && !$filename = $this->User->fileUpload($image)) {
                $this->Flash->error('Unable to modify information', array('clear' => true));

                return;
            } elseif($this->request->data['User']['profile_pic']['size'] == 0) {
                unset($this->request->data['User']['profile_pic']);
            } else {
                $this->request->data['User']['profile_pic'] = $filename;
            }

            if(!empty($this->request->data['User']['birthdate'])) {
                $this->request->data['User']['birthdate'] = date('Y-m-d', strtotime($this->request->data['User']['birthdate']));
            }

            if($this->User->save($this->request->data)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            } else {
                $this->Flash->error('Unable to modify information.', array('clear' => true));
            }
        }
    }

    public function logout() {
        $this->Session->destroy();

        return $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
}