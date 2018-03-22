<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class CommandeController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function add_commande_post() {

		//client produit quantité date_commande
		$id_user = $this->user_data->getid_user($this->post('email'));
		//$id_produit = $this->produit->getid_produit($this->post('nom_produit'));

		$udata ['id_user'] = $id_user;
		$udata ['id_produit'] = $this->post('id_produit');
		$udata ['qte_commande'] = $this->post('qte_commande');

		$datestring = '%Y/%m/%d';
      	$time = time();
      	$udata ['date_commande'] = mdate($datestring, $time);

      	$result = $this->commande->add_commande($udata);

				if ($result === FALSE) {
		            $this->response(array('status' => 'failed',
		        						  'error' => true));
		        } else {
		            $this->response(array('status' => 'success new command added',
	                                  	'error' => false));
		        		}

	}


	public function list_cmd_by_user_get() {

		if (!$this->get('id_profile')) {
			$this->response(NULL, 400);
		}

		$liste_cmd = $this->commande->listcommande_by_user($this->get('id_profile'));

		if($liste_cmd) {
			$this->response(array( 'data' => $liste_cmd,
									'error' => false));
		}
		else {
			$this->response(array('status' => 'no command avaible for you, add something to the panier',
								  'error' => true));
		}
	}

	public function add_panier_post() {
		$udata ['id_produit'] = $this->post('id_produit');
		$udata ['id_profile'] = $this->post('id_profile');
		$result = $this->panier->add_panier($udata);

			if($result === FALSE) {
				$this->response(array('status' => 'failed',
									  'error' => true));
			} else {
				$this->response(array('status' => 'success added to panier',
									  'error' => false));
			}
	}

	public function list_panier_byuser_get() {
		if (!$this->get('id_profile')) {
			$this->response(NULL, 400);
		}

		$liste_p = $this->panier->list_panier($this->get('id_profile'));

		if($liste_p) {
			$this->response(array('data' => $liste_p,
								  'error' => false));
		}
		else {
			$this->response(array('status' => 'no product on panier',
								  'error' => true));
		}
	}

	public function delete_panier_item_get($id_panier) {

		if (!$this->get('id_panier')) {
			$this->response(NULL, 400);
		}

		$result = $this->panier->delete_panier_oneitem($this->get('id_panier'));
		if ($result === FALSE) {
            $this->response(array('status' => 'failed',
        						  'error' => true));
        } else {
            $this->response(array('status' => 'success delete item from panier',
        						  'error' => false));
        }
	}

	public function getnumber_panier_get() {
		if (!$this->get('id_profile')) {
			$this->response(NULL, 400);
		}
		$nb_panier = $this->panier->count_panier_byid($this->get('id_profile'));

		if ($nb_panier) {
			$this->response(array('data' => $nb_panier,
								  'error' => false));
		}
		else {
			$this->response(array('status' => 'zero in panier',
								  'error' => true));
		}
	}

	public function ajouter_post() {


		$data = array(
				   	  array(
				      		'designation' => $this->post('designation')[0]
							),
							array(
					      	'designation' => $this->post('designation')[1]
					    )
					);

		$res = $this->test->add_batch($data);
		if ($res) {
			$this->response(array('error' => false));
		}
		else {
			$this->response(array('error' => true));
		}

	}

	/*public function build_facture_post() {

		$datestring = 'fact%Y%m%d%h%i%s';
        $time = time();
        $ref_facture = mdate($datestring, $time);

        $datestring = '%Y/%m/%d';
      	$today = time();
      	$date_facture = mdate($datestring, $today);

      	$id_profile = $this->post('id_profile');

      	$liste_c = $this->commande->listcommande_by_user('id_profile');

      	$this->facture->add_facture($udata);

	}*/

	public function add_facture_post() {

		//reference facture
		$datestring = 'fact%Y%m%d%h%i%s';
        $time = time();
        $udata ['ref_facture'] = mdate($datestring, $time);

        //date de la facture
        $datestring = '%Y/%m/%d';
      	$today = time();
      	$udata ['date_facture'] = mdate($datestring, $today);

      	$result = $this->facture->add_facture($udata);

				if ($result === FALSE) {
		            $this->response(array('status' => 'failed to create new facture',
		        						  'error' => true));
		        }
		        //success creation de nouvelle ligne dans la table facture
		        else {
		            /*$this->response(array('status' => 'success new facture created',
	                                  	'error' => false));*/
	                //obtenir id de la facture crée
	                $id_fact = $this->facture->get_factureid_byref(mdate($datestring, $time));
	                //update id_facture dans la table commande (default null)
	                $res_cmd = $this->commande->update_commande_to_idfact($id_fact);

	                if ($res_cmd === FALSE) {
	                	$this->response(array('status' => 'failed to update cmd table for the present facture',
	                						  'error' => true));
	                }
	                else {
	                	/*$this->response(array('status' => 'success new facture created and cmd table updated successfully',
	                                  	'error' => false));*/
	                    //obtenir id_user from commande by id_facture
	                    $id_user = $this->commande->get_iduser_from_commande($id_fact);
	                    //suppression du contenu du panier by id_user
	                    $res_panier = $this->panier->delete_panier_byiduser($id_user);

	                    if ($res_panier === FALSE) {
	                    	$this->response(array('status' => 'failed to delete panier by id_user',
	                    						  'error' => true));
	                    }
	                    else {
	                    	$this->response(array('status' => 'success create facture, update table cmd, delete panier by iduser',
	                                  			  'error' => false));
	                    }
	                }
		        }
	}

}
?>
