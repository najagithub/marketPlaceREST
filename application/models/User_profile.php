<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class User_profile extends CI_Model
{

	private $user_profile = 'user_profile';

	public function __construct(){
		parent::__construct();
	}

	public function add_user_profile($data) {
		$this->db->insert($this->user_profile, $data);
	}

	/*public function get_profile_byid($id_user) {
		$sql = "SELECT id_profile, pseudo_profile, nom_profile, prenom_profile, contact_profile, sexe_profile, date_naiss_profile, image_link_profile, piece_identite_profile, coord_bancaire_profile, langue_parle_profile, text_marketing_profile user_data.email 
				FROM user_profile 
				INNER JOIN user_data WHERE user_data.id_profile = ";
	}*/

	public function get_profile_byid($id_user) {
		$sql = "SELECT id_profile, pseudo_profile, nom_profile, prenom_profile, contact_profile, sexe_profile, date_naiss_profile, 		image_link_profile, piece_identite_profile, coord_bancaire_profile, langue_parle_profile, text_marketing_profile, 		user_data.email, user_data.id_adresse
				FROM user_profile
				INNER JOIN user_data ON user_data.id_user = user_profile.id_user
				 WHERE user_profile.id_user = $id_user";
		$query =  $this->db->query($sql); 
		if($query->num_rows()>0 ){
			return $query->row();
		}
		else return false;
	}

	public function update_user_profile($id_profile, $pseudo_profile, $nom_profile, $prenom_profile, $contact_profile, $sexe_profile, $date_naiss_profile, $coord_bancaire_profile, $langue_parle_profile, $text_marketing_profile, $ville, $rue, $code_postal, $id_pays) {
		//$this->db->where('id_profile', $id_profile);
        //$this->db->update($this->user_profile, $data);
        /*UPDATE User_profile INNER JOIN user_data ON user_data.id_user = user_profile.id_user INNER JOIN adresse ON adresse.id_adresse = user_data.id_adresse SET pseudo_profile = 'pseudo_kim', nom_profile = 'nom', prenom_profile = 'prenom', contact_profile = 123456, sexe_profile = 'sexe', date_naiss_profile = '1996-04-07', coord_bancaire_profile = 123456, langue_parle_profile = 'multi langage', text_marketing_profile = 'texte marketing', adresse.ville = 'tanana', adresse.rue = 'boulevard de l europe', adresse.code_postal = 101, adresse.id_pays = 450 WHERE id_profile = 48*/
        
        $sql = "UPDATE User_profile
        		INNER JOIN user_data ON user_data.id_user = User_profile.id_user
        		INNER JOIN adresse ON adresse.id_adresse = user_data.id_adresse
        		ON up.id_adresse = adr.id_adresse
        		SET 
        			pseudo_profile = $pseudo_profile,
        			nom_profile = $nom_profile,
        			prenom_profile = $prenom_profile,
        			contact_profile = $contact_profile,
        			sexe_profile = $sexe_profile,
        			date_naiss_profile = $date_naiss_profile,
        			coord_bancaire_profile = $coord_bancaire_profile,
        			langue_parle_profile = $langue_parle_profile,
        			text_marketing_profile = $text_marketing_profile,
        			adresse.ville = $ville,
        			adresse.rue = $rue,
        			adresse.code_postal = $code_postal,
        			adresse.id_pays = $id_pays
        		WHERE id_profile = $id_profile";
        $query = $this->db->query($sql);
	}
	
}
?>
