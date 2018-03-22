<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Message extends CI_Model {

    private $message = 'message';
    
     public function __construct() {
        parent::__construct();
    }
    
    public function send_message($data) {
        $this->db->insert($this->message, $data);
    }

    public function get_discussion($id_sender,$id_receiver) {
        $sql = "SELECT corps_message, date_envoi, status_delete_sender, status_delete_receiver, status_view_receiver, user_data.id_user
                FROM message
                INNER JOIN user_data ON user_data.id_user = message.id_receiver
                WHERE id_sender = $id_sender AND id_receiver = $id_receiver
                OR id_sender = $id_receiver AND id_receiver = $id_sender
                ORDER BY date_envoi";
        $query = $this->db->query($sql);
        
        if ($query) {
            return $query->result();
        }
        return NULL;
    }

    /*public function delete_discussion() {
        $this->db->set('status_delete_sender', 'Y')->where('message.id_sender',$id_sender)->where('message.id_receiver',)->update($this->commande);
    }*/

}
?>