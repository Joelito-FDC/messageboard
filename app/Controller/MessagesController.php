<?php

class MessagesController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Paginator');
    public $uses = array('User', 'Message');

    public function index() {
        $this->layout = '';
        $this->set('username', $this->Session->read('User.name'));
    }


    public function threads($recipientId) {
        $this->layout = '';

        if(empty($this->Session->read('User.id'))) return $this->redirect(array('controller' => 'users', 'action' => 'login'));

        $this->set('recipientId', $recipientId);
    }


    public function convo($view, $recipientId = null) {
        $this->layout = '';
        
        if(empty($this->Session->read('User.id'))) {
            echo "<div style='text-align: center;'>Prohibited</div>";

            exit();
        }

        $this->Paginator->settings = array(
            'limit' => 10, 
            'order' => array(
                'Message.created' => 'desc'
            ),
            'fields' => array('Message.message, Message.created, Message.recipient_id, Message.user_id')
        );

        if($view == 'threads' && $recipientId) {
            $data = $this->Paginator->paginate('Message', array(
                'OR' => array(
                    array(
                        'Message.recipient_id' => $recipientId,
                        'Message.user_id' => $this->Session->read('User.id')
                    ),
                    array(
                        'Message.recipient_id' => $this->Session->read('User.id'),
                        'Message.user_id' => $recipientId
                    )              
                )
            ));
            $this->set('page', 'thread');
        } else {
            $this->Paginator->settings = array(
                'limit' => 10,
                'fields' => array('Message.user_id', 'Message.recipient_id', 'Message.message', 'Message.id', 'Message.created'),
                'order' => array('Message.created' => 'asc'),
                'group' => array('(`Message`.`user_id` + `Message`.`recipient_id`)')
            );
            $data = $this->Paginator->paginate('Message', array(
                'OR' => array(
                    'Message.user_id' => $this->Session->read('User.id'),
                    'Message.recipient_id' => $this->Session->read('User.id')
                )
            ));
            $this->set('page', 'list');
        }

        $this->set('messages', $data); 
        $this->set('userId', $this->Session->read('User.id'));
    }


    public function new() {
        $this->layout = '';

        if(empty($this->Session->read('User.id'))) return $this->redirect(array('controller' => 'users', 'action' => 'login'));

        $this->set('recipient', $this->User->find('all'));
        $this->set('userId', $this->Session->read('User.id'));
    }


    public function send($recipientId) {
        $this->response->type('text');

        if(empty($this->Session->read('User.id'))) {
            echo "_not_sent_";

            exit();
        }

        if($this->request->is('post')) {
            $request = $this->request->data;
            
            $this->Message->create();
            
            if($this->Message->save(array('Message' => array('user_id' => $this->Session->read('User.id'), 'recipient_id' => $recipientId, 'message' => $request['message'])))) {
                echo "_sent_";
            } else {
                echo "_not_sent_";
            }

            exit();
        }
    }

    public function delete() {
        $this->response->type('text');

        if(empty($this->Session->read('User.id'))) {
            echo "_not_sent_";

            exit();
        }

        if($this->request->is('post')) {
            $request = $this->request->data;

            $this->Message->create();

            if($this->Message->deleteAll(array('Message.user_id' => $request['user'], 'Message.recipient_id' => $request['recipient']))) {
                echo "_deleted_";
            } else {
                echo "_not_deleted_";
            }
            
            exit();
        }
    }
}