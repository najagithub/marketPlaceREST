<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class FactureController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function add_facture_post() {
		
		$datestring = 'fact%Y%m%d%h%i%s';
        $time = time();
        $udata ['ref_facture'] = mdate($datestring, $time);

        $datestring = '%Y/%m/%d';
      	$today = time();
      	$udata ['date_facture'] = mdate($datestring, $today);

      	$udata ['id_commande'] = $this->post('id_commande');

      	$result = $this->facture->add_facture($udata);

				if ($result === FALSE) {
		            $this->response(array('status' => 'failed',
		        						  'error' => true));
		        } else {
		            $this->response(array('status' => 'success new facture created',
	                                  	'error' => false));
		        		}
	}

	public function creer_facture_post() {
		
	}
}
?>
