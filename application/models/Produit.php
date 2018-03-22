<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Produit extends CI_Model
{

	private $produit = 'produit';

	public function __construct(){
		parent::__construct();
	}

	public function add_produit($data) {
		$this->db->insert($this->produit, $data);
	}

	public function list_produit() {

		$sql = "SELECT id_produit, nom_produit, categorie.nom_categorie,sales, qte_produit, prix_unitaire, description, image_produit.link_image_pple, user_data.email, marque.nom_marque
				FROM produit
				INNER JOIN image_produit ON image_produit.id_image_produit = produit.id_image
				INNER JOIN marque ON marque.id_marque = produit.id_marque
				INNER JOIN categorie ON categorie.id_categorie = produit.id_categorie
				INNER JOIN user_data ON user_data.id_user = produit.id_user
				ORDER BY sales AND created_date DESC ";

        $query = $this->db->query($sql);

        if ($query) {
            return $query->result();
        }
        return NULL;
	}

	public function getbyid_produit($id_produit) {
		$query =  $this->db->select('*')->from($this->produit)->where('id_produit',"$id_produit")->get();
		if($query->num_rows()>0 ){
			return $query->row();
		}
		else return false;
	}

	public function search_by_nom_produit($cle_nom) {
		$sql = "SELECT * FROM produit WHERE nom_produit LIKE '%".$cle_nom."%'";
		$query = $this->db->query($sql);

		if($query) {
			return $query->result();
		}
		return NULL;
	}

	public function search_by_categorie($cle_categorie) {
		$sql = "SELECT id_produit, nom_produit, type_produit, qte_produit, prix_unitaire, dimension, description, image_produit.link_image_pple, user_data.email, marque.nom_marque
				FROM produit
				INNER JOIN image_produit ON image_produit.id_image_produit = produit.id_image
				INNER JOIN user_data ON user_data.id_user = produit.id_user
				INNER JOIN marque ON marque.id_marque = produit.id_marque
				INNER JOIN categorie
				WHERE produit.id_categorie = categorie.id_categorie AND categorie.nom_categorie LIKE '%".$cle_categorie."%'";
		$query = $this->db->query($sql);

		if($query) {
			return $query->result();
		}
		return NULL;
	}

	public function search_between_prix($cle_prix_min, $cle_prix_max, $cle_categorie) {
		$sql = "SELECT id_produit, nom_produit, type_produit, qte_produit, prix_unitaire, image_produit.link_image_pple, user_data.email, categorie.nom_categorie, marque.nom_marque
				FROM produit
				INNER JOIN image_produit ON image_produit.id_image_produit = produit.id_image
				INNER JOIN categorie ON categorie.id_categorie = produit.id_categorie
				INNER JOIN marque ON marque.id_marque = produit.id_marque
				INNER JOIN user_data ON user_data.id_user = produit.id_user
				WHERE prix_unitaire BETWEEN $cle_prix_min AND $cle_prix_max AND nom_categorie LIKE '%".$cle_categorie."%' ";
		$query = $this->db->query($sql);

		if($query) {
			return $query->result();
		}
		return NULL;
	}

	public function list_by_marque($cle_marque) {
		$sql = "SELECT id_produit, nom_produit, type_produit, qte_produit, prix_unitaire, image_produit.link_image_pple, user_data.email, categorie.nom_categorie, marque.nom_marque
				FROM produit
				INNER JOIN image_produit ON image_produit.id_image_produit = produit.id_image
				INNER JOIN categorie ON categorie.id_categorie = produit.id_categorie
				INNER JOIN user_data ON user_data.id_user = produit.id_user
				INNER JOIN marque
				WHERE marque.id_marque = produit.id_marque AND marque.nom_marque LIKE '%".$cle_marque."%'";
		$query = $this->db->query($sql);

		if ($query) {
			return $query->result();
		}
		return NULL;
	}

	public function search_by_nom($cle_search) {
		$sql = "SELECT id_produit, nom_produit,sales, qte_produit, prix_unitaire, image_produit.link_image_pple, user_data.email, categorie.nom_categorie, marque.nom_marque
				FROM produit
				INNER JOIN image_produit ON image_produit.id_image_produit = produit.id_image
				INNER JOIN categorie ON categorie.id_categorie = produit.id_categorie
				INNER JOIN user_data ON user_data.id_user = produit.id_user
				INNER JOIN marque ON marque.id_marque = produit.id_marque
				where marque.nom_marque LIKE '%$cle_search%'
				OR categorie.nom_categorie LIKE '%$cle_search%'
				OR nom_produit LIKE '%$cle_search%'
				ORDER BY sales AND created_date DESC ";
		$query = $this->db->query($sql);

		if ($query) {
			return $query->result();
		}
		return NULL;
	}

}
