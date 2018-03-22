<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Categorie extends CI_Model
{

	private $categorie = 'categorie';

	public function __construct(){
		parent::__construct();
	}

	public function add_categorie($nom_categorie){
		//$this->db->insert($this->categorie, $nom_categorie);
		$sql = "INSERT INTO categorie (nom_categorie) VALUES ('$nom_categorie')";
		$query = $this->db->query($sql);
	}

	public function getid_categorie($nom_categorie) {
		$query = $this->db->select('*')->from($this->categorie)->where('nom_categorie', $nom_categorie)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

		if($nb_query == 1) {
			$id_c = $result->id_categorie;
			return $id_c;
		} else {
			return 'false';
		}
	}

	public function getnom_categorie($id_categorie) {
		$query = $this->db->select('nom_categorie')->from('categorie')->where('id_categorie', $id_categorie)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

    	if($nb_query == 1) {
    		$nom_c = $result->nom_categorie;
    		return $nom_c;
    	} else {
    		$nom_c = 0;
    		return $nom_c;
    	}
	}

	public function list_categorie() {
		$query = $this->db->select('*')->from('categorie')->get();

        $result = $query->result();
	  	return $result;
	}
}
?>