<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class PaysController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function list_pays_get() {
		$liste_p = $this->pays->list_pays();

		if($liste_p) {
			$this->response(array('data' => $liste_p,
								  'error' => false));
		}
		else {
			$this->response(array('status' => 'failed to fecth data from pays',
								  'error' => true));
		}
	}
}
?>
