<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class ProduitController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function add_produit_post() {

		//configuration upload image
	$config['upload_path'] = 'uploads/produit';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 20480000;
        $config['max_width'] = 8000;
        $config['max_height'] = 8000;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = FALSE;
        $config['max_filename'] = 10;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['mod_mime_fix'] = TRUE;
        $url_pple = NULL;
        $url1 = NULL;
        $url2 = NULL;
        $url3 = NULL;
        $this->upload->initialize($config);

        //tableau produit et get formulaire
		$udata ['nom_produit'] = $this->post('nom_produit');
		$udata ['type_produit'] = $this->post('type_produit');
		$udata ['qte_produit'] = $this->post('qte_produit');
		$udata ['prix_unitaire'] = $this->post('prix_unitaire');
		$udata ['description'] = $this->post('description');
		$udata ['sales'] = $this->post('sales');
		$udata ['id_user'] = $this->post('id_user');

		$nom_mrq = $this->post('nom_marque');
		$nom_cat = $this->post('nom_categorie');

		$udata ['id_pays'] = $this->pays->getid_pays($this->post('nom_pays'));

		$mark = $this->marque->getid_marque($nom_mrq);
		if($mark == 'false') {
			$this->marque->add_marque($nom_mrq);
			$mark = $this->marque->getid_marque($nom_mrq);
			//$udata['id_marque'] = $mark;
		}

			$udata['id_marque'] = $mark;
		//var_dump($mark);

		//$udata['id_marque'] = $mark;

		$catg = $this->categorie->getid_categorie($nom_cat);
		if($catg == 'false') {
			$this->categorie->add_categorie($nom_cat);
			$catg = $this->categorie->getid_categorie($nom_cat);
			//$udata['id_categorie'] = $catg;
		}

			$udata['id_categorie'] = $catg;

		//fonction upload image
		//userfile_pple userfile1 userfile2 userfile3 upload


        if (!$this->upload->do_upload('userfile_pple')) {
            return $this->response(array('status' => 'failed userfile_pple'));
        }
        else {
             $data = array('upload_data' => $this->upload->data());
             $url_pple = site_url().'uploads/produit/'.$this->upload->data('file_name');
        }

     $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile1')) {
               $data = array('upload_data' => $this->upload->data());
               $url1 = site_url().'uploads/produit/'.$this->upload->data('file_name');
            }

      $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile2')) {
                    $data = array('upload_data' => $this->upload->data());
                    $url2 = site_url().'uploads/produit/'.$this->upload->data('file_name');
                }

      $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile3')) {
                       $data = array('upload_data' => $this->upload->data());
                       $url3 = site_url().'uploads/produit/'.$this->upload->data('file_name');
                    }

        $dat['link_image_pple'] = $url_pple;
        $dat['link_image_1'] = $url1;
        $dat['link_image_2'] = $url2;
	    $dat['link_image_3'] = $url3;

        $image_base = $this->image_produit->add_image_produit($dat);

       if ($image_base === FALSE) {
            $this->response(array('status' => 'failed insert url image',
                                  'error' => true));
        	}
        	 else {
        	 	$udata['id_image'] = $this->image_produit->getid_image($url_pple);

        	 	$result = $this->produit->add_produit($udata);

				if ($result === FALSE) {
		            $this->response(array('status' => 'failed',
		        						  'error' => true));
		        } else {
		            $this->response(array('status' => 'success insert url image and produit',
	                                  'url_pple' => $url_pple,
	                                  'url1' => $url1,
	                                  'url2' => $url2,
	                                  'url3' =>$url3,
	                                  'error' => false));
		        		}
                 }
	}

	public function list_produit_get() {
		$listes = $this->produit->list_produit();

		if($listes) {
			$this->response(array('data' => $listes,
								  'error' => false));
		}
		else {
			$this->response(array('status' => 'failed to fecth data from database',
								  'error' => true));
		}
	}

	public function get_produit_get() {
		if (!$this->get('id_produit')) {
            $this->response(NULL, 400);
        }

        $produit = $this->produit->getbyid_produit($this->get('id_produit'));

        if ($produit) {

        	$udata['id_produit'] = $produit->id_produit;
        	$udata['nom_produit'] = $produit->nom_produit;
        	$udata['type_produit'] = $produit->type_produit;
        	$udata['qte_produit'] = $produit->qte_produit;
        	$udata['prix_unitaire'] = $produit->prix_unitaire;
        	$udata['description'] = $produit->description;
        	//$udata['dimension'] = $produit->dimension;

        	$udata['nom_pays'] = $this->pays->getnom_pays($produit->id_pays);
        	$udata['nom_marque'] = $this->marque->getnom_marque($produit->id_marque);
        	$udata['nom_categorie'] = $this->categorie->getnom_categorie($produit->id_categorie);

        	$udata['url_pple'] = $this->image_produit->get_urlpple_image($produit->id_image);
        	$udata['url1'] = $this->image_produit->get_url1_image($produit->id_image);
        	$udata['url2'] = $this->image_produit->get_url2_image($produit->id_image);
        	$udata['url3'] = $this->image_produit->get_url3_image($produit->id_image);

        	$udata['mail_user'] = $this->user_data->getmail_user($produit->id_user);
            $this->response($udata, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('status' => 'no match item for the id',
        						  'error' => true));
        }
	}

	public function search_nom_get() {
		if (!$this->get('cle_nom')) {
			$this->response(NULL, 400);
		}

		$list_by_nom = $this->produit->search_by_nom_produit($this->get('cle_nom'));

		if($list_by_nom) {
			$this->response(array('data' => $list_by_nom,
								  'error' => false));
		}
		else {
			$this->response(array('status' => 'no match item for your key word',
								  'error'=> true));
		}
	}

	public function search_categorie_get() {
		if (!$this->get('cle_categorie')) {
			$this->response(NULL, 400);
		}

		$list_by_cat = $this->produit->search_by_categorie($this->get('cle_categorie'));

		if($list_by_cat) {
			$this->response(array('data' => $list_by_cat,
								  'error' => false));
			//$this->response(array('error' => false));
		}
		else {
			$this->response(array('status' => 'no match item for your category key word',
								  'error' => true));
		}
	}

	public function search_between_prix_get() {
		if(!$this->get('cle_prix_min') && !$this->get('cle_prix_max') && !$this->get('cle_categorie')) {
			$this->response(NULL, 400);
		}

		$list_between_prix = $this->produit->search_between_prix($this->get('cle_prix_min'), $this->get('cle_prix_max'), $this->get('cle_categorie'));

		if($list_between_prix) {
			$this->response(array('data' => $list_between_prix,
								  'error' => false));
		}
		else {
			$this->response(array('status' => 'no product avaible for your price limit',
								   'error' => true));
		}
	}

	public function list_marque_get() {
		$list_mark = $this->marque->list_marque();

		if($list_mark) {
			$this->response(array('data' => $list_mark,
								  'error' => false));
		}
		else {
			$this->response(NULL, 404);
		}
	}

	public function list_by_marque_get() {
		if(!$this->get('cle_marque')) {
			$this->response(NULL, 400);
		}

		$list_by_m = $this->produit->list_by_marque($this->get('cle_marque'));

		if($list_by_m) {
			$this->response(array('data' => $list_by_m,
								  'error' => false));
		}
		else {
			$this->response(array('status' => 'no product avaible for your marque choice',
								  'error' => true));
		}
	}

	public function change_cours_post() {

	    // change amount according to your needs
	    $amount =$this->post('txt_amt');
	    // change From Currency according to your needs
	    $from_Curr =$this->post('cur_frm');//"INR";
	    // change To Currency according to your needs
	    $to_Curr =$this->post('cur_to');
	    $converted_currency=$this->currency_lib->currencyConverter($from_Curr, $to_Curr, $amount);
	    // Print outout
	    $this->response(array('data' => $converted_currency,
							  'error' => false));

	}

	public function search_by_nomproduit_get() {
		if (!$this->get('cle_search')) {
			$this->response(NULL, 400);
		}

		$list_by_nom = $this->produit->search_by_nom($this->get('cle_search'));

		if($list_by_nom) {
			$this->response(array('data' => $list_by_nom,
								  'error' => false));
			//$this->response(array('error' => false));
		}
		else {
			$this->response(array('status' => 'no match item for your key word',
								  'error' => true));
		}
	}

}
?>
