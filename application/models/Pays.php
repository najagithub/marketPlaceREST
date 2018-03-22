<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Pays extends CI_Model
{

	private $pays = 'pays';

	public function __construct(){
		parent::__construct();
	}

	public function getid_pays($nom_fr_fr) {
		$query = $this->db->select ('code')->from('pays')->where('nom_fr_fr', $nom_fr_fr)->get();
		$result = $query->row();
    	$nb_query = $query->num_rows();

    	if($nb_query == 1) {
    		$id_p = $result->code;
    		return $id_p;
    	} else {
    		$id_p = 0;
    		return $id_p;
    	}
	}

	public function getnom_pays($id_pays) {
		$query = $this->db->select('nom_fr_fr')->from('pays')->where('code', $id_pays)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

    	if($nb_query == 1) {
    		$nom_p = $result->nom_fr_fr;
    		return $nom_p;
    	} else {
    		$nom_p = 0;
    		return $nom_p;
    	}
	}

    public function list_pays() {
        $query = $this->db->select('nom_fr_fr')->from($this->pays)->get();
        return $query->result();
    }
}
?>
