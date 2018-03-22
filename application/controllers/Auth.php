<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	}

	public function index() {
		echo 'index auth';
	}

	public function add(){
		$this->load->view('add_user');
	}

	function add_user(){
		 //$udata ['email'] = $this->input->post('email');
		 //$udata ['password'] = md5($this->input->post('password'));
		 
		 //$salt = md5($this->input->post('password'));

		 //$password_encrypted = md5($salt.''.$this->input->post('password'));
		 //var_dump($salt);
         //var_dump($password_encrypted);

        //$format = 'DATE_RFC822';
		//$time = time();

         //$date = time();  //string date ( string $format [, int $timestamp = time() ] )
         //var_dump(standard_date($format, $time));
		 /*$res = $this->user_data->creer_user($udata);
		 if ($res)
		 {
            header('location:' .base_url() . "index.php/".$this->index());
            
         }*/

         //$msg = md5($this->input->post('message'));
         //var_dump($msg);

         /*$list = $this->produit->list_produit(); 
         var_dump($list);
         $data = [];
         foreach ($list as $list_key) {
         	 echo $list_key->id_produit; 
         	 	$data['id_produit'][] = $list_key->id_produit;
         	 echo $list_key->nom_produit;
         	 	$data['nom_produit'][] = $list_key->nom_produit;
         	 echo $list_key->type_produit; 
         	 	$data['type_produit'][] = $list_key->type_produit;
         	$data['qte_produit'] = $list_key->qte_produit;
         	$data['prix_unitaire'] = $list_key->prix_unitaire;
         	$data['description'] = $list_key->description;
         	$data['dimension'] = $list_key->dimension;*/
         
           // $detail = $this->produit->search_by_nom_produit('mahery');
      //$time = date_timestamp_get();
      //var_dump($time);

      /*$datestring = '%d/%m/%Y';
         $time = time();
         $udata ['date_commande'] = mdate($datestring, $time);
         var_dump($udata);*/

         
      /*$datestring = 'fact%Y%m%d%h%i%s';
        $time = time();
        $a = mdate($datestring, $time);

        $datestring = '%Y/%m/%d';
         $today = time();
         $b = mdate($datestring, $today);

         var_dump($a);
         var_dump($b);*/

         /*$var['id_profile'] = $this->commande->get_iduser_from_commande(1);
         var_dump($var); */
         //$id_a = $this->adresse->get_lastinsert_id();
         //var_dump($id_a);     
         //$num = $this->panier->count_panier_byid(1);
         //var_dump($num);

         $id_a = $this->user_data->get_id_adresse(1);
         var_dump($id_a);
	}

    public function vue() {
        $this->load->view('auth');
    }

    public function upload() {

        //configuration upload image
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
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

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('input_image')) {
            echo 'misi erreur';
        } 
        else {
            $data = array('upload_data' => $this->upload->data());
            $image_link = site_url().'uploads/'.$this->upload->data('file_name');
            echo $image_link;
        }

    }
}
?>