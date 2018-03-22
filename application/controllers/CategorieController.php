<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class CategorieController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function list_categorie_get() {
		$liste_cat = $this->categorie->list_categorie();

		if($liste_cat) {
			$this->response($liste_cat, 200);
		}
		else {
			$this->response(NULL, 404);
		}
	} 
}
?>