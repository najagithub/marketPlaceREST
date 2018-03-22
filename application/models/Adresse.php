<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Adresse extends CI_Model
{

	private $adresse = 'adresse';

	public function __construct(){
		parent::__construct();
	}

	public function add_adresse($tab) {
		$this->db->insert($this->adresse, $tab);
	}
	
	public function get_lastinsert_id($certificat_residence) {
		$query = $this->db->select('id_adresse')->from($this->adresse)->where('adresse.certificat_residence', $certificat_residence)->get();

		$result = $query->row();
    	$nb_query = $query->num_rows();
		if($nb_query == 1) {
            $id_a = $result->id_adresse;
            return $id_a;
        } else {
            $id_a = 0;
            return $id_a;
        }
	}

	public function get_adresse_byid($id_adresse) {
		$sql = " SELECT ville, rue, code_postal, certificat_residence, pays.nom_fr_fr 
				 FROM adresse
				 INNER JOIN pays ON pays.code = adresse.id_pays
				 WHERE id_adresse = $id_adresse ";
		$query = $this->db->query($sql);

		if($query) {
			return $query->row();
		}
		return NULL;
	}

	public function update_adresse($data, $id_adresse) {
		$this->db->where('id_adresse', $id_adresse);
        $this->db->update($this->id_adresse, $data);
	}

}
?>