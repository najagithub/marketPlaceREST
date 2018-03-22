<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class RoleController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function list_role_get() {
		$liste_r = $this->role->list_role();

		if($liste_r) {
			$this->response(array('data' => $liste_r,
								  'error' => false));
		}
		else {
			$this->response(NULL, 404);
		}
	}
}
?>