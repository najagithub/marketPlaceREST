<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Marque extends CI_Model
{

	private $marque = 'marque';

	public function __construct(){
		parent::__construct();
	}

	public function add_marque($nom_marque) {
		//$this->db->insert($this->marque, $nom_marque);
		$sql = "INSERT INTO marque (nom_marque) VALUES ('$nom_marque')";
		$query = $this->db->query($sql);
	  	//$result = $query->result();
	}

	public function getid_marque($nom_marque) {
		$query = $this->db->select('*')->from($this->marque)->where('nom_marque', $nom_marque)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

		if($nb_query == 1) {
			$id_m = $result->id_marque;
			return $id_m;
		} else {
			return 'false';
		}
	}

	public function getnom_marque($id_marque) {
		$query = $this->db->select('nom_marque')->from('marque')->where('id_marque', $id_marque)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

    	if($nb_query == 1) {
    		$nom_m = $result->nom_marque;
    		return $nom_m;
    	} else {
    		$nom_m = 0;
    		return $nom_m;
    	}
	}

	public function list_marque() {
		//$query = $this->db->select('nom_marque')->from('marque')->get();

		$sql = "SELECT nom_marque FROM marque ORDER BY nom_marque";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
}
?>
