<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Commande extends CI_Model
{

	private $commande = 'commande';

	public function __construct(){
		parent::__construct();
	}

	public function add_commande($data) {
		$this->db->insert($this->commande, $data);
	}

	public function listcommande_by_user($id_profile) {
		$sql = "SELECT id_commande, date_commande, qte_commande, user_data.email, produit.nom_produit, produit.prix_unitaire 
		FROM commande 
		INNER JOIN user_data ON user_data.id_user = commande.id_profile 
		INNER JOIN produit ON produit.id_produit = commande.id_produit 
		WHERE commande.id_profile = $id_profile ";
		
		$query = $this->db->query($sql);
		if ($query) {
            return $query->result();
        }
        return NULL;
	}

	/*public function getcommande_userid() {
		$sql = "SELECT id_profile FROM commande WHERE ";
	}

	public function add_idfact_to_commande($id_profile) {
		$data = $this->listcommande_by_user($id_profile);
	}*/

	public function update_commande_to_idfact($id_fact, $id_profile) {
		$this->db->set('id_facture', $id_fact)->where('commande.id_profile',$id_profile)->where('commande.id_facture', 0 )->update($this->commande);
	}

	public function get_iduser_from_commande($id_fact) {

		//limite a revoir -- incoherent satri ts voatery ho iray ny ao amin commande
		$query = $this->db->select('id_profile')->from('commande')->where('id_facture', $id_fact)->limit(1)->get();

		if ($query){
			$id_f = $query->row();
			return $id_f;
		}
		else{
			return false;
		 }
	}

	public function get_sum_commande() {
		//$query = $this->db->select('date_commande', 'qte_commande', '')
		$sql = "SELECT date_commande, (qte_commande * produit.prix_unitaire) AS montant
				FROM commande
				INNER JOIN produit ON produit.id_produit = commande.id_produit";
		
		$query = $this->db->query($sql);
		if($query) {
		  return $query->result();
		}
		return NULL;
	}
}
?>