<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Facture extends CI_Model
{

	private $facture = 'facture';

	public function __construct(){
		parent::__construct();
	}

	public function add_facture($data) {
		return $this->db->insert($this->facture, $data);
	}

	public function get_factureid_byref($id_facture) {
		$query = $this->db->select('id_facture')->from($this->facture)->where('id_facture', $id_facture)->get();
		$result = $query->row();
        $nb_query = $query->num_rows();

        if($nb_query == 1) {
            $id_f = $result->id_facture;
            return $id_f;
        } else {
            $id_f = 0;
            return $id_f;
        }
	}

}
?>