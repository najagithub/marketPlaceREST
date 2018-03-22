<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class ChatController extends REST_Controller {
    function __construct() {
        parent:: __construct();
    }
    
    /*function send_message_post(){
        $corps_message = $this->post('corps_message');
        $id_sender = $this->post('id_sender');
        $id_receiver = $this->post('id_receiver');
        
        $send_message = $this->message->send_message($corps_message,$id_sender,$id_receiver);
         if ($send_message == TRUE) {
                return $this->response(array('status' => 'success'));
            } else {
                return $this->response(array('status' => 'failed'));
            }      
    } */

    public function send_message_post() {
        $data ['corps_message'] = $this->post('corps_message');
        $data ['id_sender'] = $this->post('id_sender');
        $data ['id_receiver'] = $this->post('id_receiver');
        
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $data ['date_envoi'] = mdate($datestring, $time);

        $data ['status_delete_sender'] = 'N' ;
        $data ['status_delete_receiver'] = 'N' ;
        $data ['status_view_receiver'] = 'N' ;

        $response = $this->message->send_message($data);
        if ($result === FALSE) {
        $this->response(array('status' => 'failed',
                              'error' => true));
        } else {
        $this->response(array('status' => 'success new message sent',
                            'error' => false));
        }

    }

    public function get_discussion_get() {
        if (!$this->get('id_sender') || !$this->get('id_receiver')) {
            $this->response(array('status' => 'no id_sender or id_receiver detected',
                                  'error' => true));
        }

        $discussion = $this->message->get_discussion($this->get('id_sender'), $this->get('id_receiver'));

        if($discussion) {
            $this->response(array('data' => $discussion,
                                  'error' => false));
        }
        else {
            $this->response(array('status' => 'no discussion yet, send hello first',
                                  'error' => true));
        }
    }

    /*public function delete_discussion_post() {

    }*/
}
?>