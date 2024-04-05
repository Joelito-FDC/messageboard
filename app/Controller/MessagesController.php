<?php

class MessagesController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Paginator');
    public $uses = array('User', 'Message');
    public $paginate = array(
        'limit' => 5, 
        'order' => array(
            'Message.created' => 'desc'
        ),
        'fields' => array('Message.message, Message.created')
    );

    public function index() {
        $this->layout = '';

        $this->set('people', $this->User->find('all'));
    }


    public function threads($recipientId) {
        $this->layout = '';
        $this->Paginator->settings = $this->paginate;
        
        $data = $this->Paginator->paginate('Message', array(
            'OR' => array(
                array('Message.recipient_id' => $recipientId),
                array('Message.recipient_id' => $this->Session->read('User.id'))
            ),
            'OR' => array(
                array('Message.user_id' => $recipientId),
                array('Message.user_id' => $this->Session->read('User.id'))
            )
        ));

        $this->Paginator->options(array('update' => '#thread-message-list', 'evalScripts' => true));

        if($this->request->is('post')) {
            $this->Message->create();   
        }
    }

    public function new() {
        $this->layout = '';

        $this->set('recipient', $this->User->find('all'));
        $this->set('userId', $this->Session->read('User.id'));
    }


    public function send() {
        $this->response->type('text');

        if($this->request->is('post')) {
            $request = $this->request->data;
            $this->Message->create();
            
            if($this->Message->save(array('Message' => array('user_id' => $request['sender'], 'recipient_id' => $request['recipient'], 'message' => $request['message'])))) {
                echo "_sent_";
            } else {
                echo "_not_sent_";
            }

            exit();
        }
    }
}