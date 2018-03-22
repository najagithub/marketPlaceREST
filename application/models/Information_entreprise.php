<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Information_entreprise extends CI_Model
{

	private $information_entreprise = 'information_entreprise';

	public function __construct(){
		parent::__construct();
	}

	public function add_information($data) {
		$this->db->insert($this->information_entreprise, $data);
	}

	public function get_information_byid($id_user) {
		$sql = "SELECT id_profile, pseudo_info, nom_dirigeant, prenom_dirigeant, numero_tva, telephone, image_link_piece_identity, coord_bancaire_society, acte_constitution_society, user_data.email
				FROM information_entreprise 
				INNER JOIN user_data ON user_data.id_user = information_entreprise.id_user
				 WHERE information_entreprise.id_user = $id_user";
		$query =  $this->db->query($sql); 
		if($query->num_rows()>0 ){
			return $query->row();
		}
		else return false;
	}
}
?>