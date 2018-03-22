<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class GrapheController extends REST_Controller {
    
    function __construct() {
        parent:: __construct();
    }

    public function get_somme_commande_get() {
    	$list_com = $this->commande->get_sum_commande();

    	if($list_com) {
			$this->response($list_com);
		}
		else {
			$this->response(array('status' => 'failed to fecth data from database',
								  'error' => true));
		}
    }
}

?>