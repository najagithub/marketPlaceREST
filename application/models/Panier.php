<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Panier extends CI_Model
{

	private $panier = 'panier';

	public function __construct(){
		parent::__construct();
	}

	public function add_panier($data) {
		$this->db->insert($this->panier, $data);
	}

	public function list_panier($id_profile) {
		$sql = "SELECT panier.id_produit, id_profile, produit.nom_produit, produit.prix_unitaire, produit.qte_produit, user_data.email 
				FROM panier 
				INNER JOIN produit ON produit.id_produit = panier.id_produit 
				INNER JOIN user_data ON user_data.id_user = panier.id_profile 
				WHERE panier.id_profile = $id_profile";

		$query = $this->db->query($sql);

		if($query) {
			return $query->result();
		}
		return NULL;
	}

	public function delete_panier_byiduser($id_profile) {
		$this->db->where('id_profile', $id_profile);
        return $this->db->delete($this->panier);
	}

	public function delete_panier_oneitem($id_panier) {
		$this->db->where('id_panier', $id_panier);
		return $this->db->delete($this->panier);
	}

	public function count_panier_byid($id_profile) {
		$query = $this->db->select('*')->from('panier')->where('id_profile', $id_profile)->get();
		$countrow = $query->num_rows();
		return $countrow;
	}
}
?>