<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class SocialActionController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function add_like_post() {
		$data ['id_user'] = $this->post('id_user');
		$data ['id_produit'] = $this->post('id_produit');

		$response = $this->like->add_like($data);

		if ($result === FALSE) {
        $this->response(array('status' => 'failed',
    						  'error' => true));
    	} else {
        $this->response(array('status' => 'success new likes added',
                          	'error' => false));
		}
	}

	public function add_comment_post() {
		$data ['id_user'] = $this->post('id_user');
		$data ['id_produit'] = $this->post('id_produit');
		$data ['text_comment'] = $this->post('text_comment');

		$response = $this->comment->add_comment($data);

		if ($result === FALSE) {
        $this->response(array('status' => 'failed',
    						  'error' => true));
    	} else {
        $this->response(array('status' => 'success new comment added',
                          	'error' => false));
		}
	}
}
?>