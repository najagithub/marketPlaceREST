<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class ProfileController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function add_profile_post() {
		
		//configuration upload image
		$config['upload_path'] = 'uploads/profile';
        $config['allowed_types'] = '*';
        $config['max_size'] = 20480000;
        $config['max_width'] = 8000;
        $config['max_height'] = 8000;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = FALSE;
        $config['max_filename'] = 10;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['mod_mime_fix'] = TRUE;

        $image_link_profile = NULL;
        $piece_identity_profile = NULL;

        //data table user_profile
		$udata ['pseudo_profile'] = $this->post('pseudo_profile');
		$udata ['nom_profile'] = $this->post('nom_profile');
		$udata ['prenom_profile'] = $this->post('prenom_profile');
		$udata ['contact_profile'] = $this->post('contact_profile');
		$udata ['sexe_profile'] = $this->post('sexe_profile');
		$udata ['date_naiss_profile'] = $this->post('date_naiss_profile');
		$udata ['langue_parle_profile'] = $this->post('langue_parle_profile');
		$udata ['text_marketing_profile'] = $this->post('text_marketing_profile');
		$udata ['coord_bancaire_profile'] = $this->post('coord_bancaire_profile');
		$udata ['id_pays_profile'] = $this->pays->getid_pays($this->post('nom_pays_profile'));
		$udata ['id_user'] = $this->post('id_user');

		//data table adresse
		$tab ['ville'] = $this->post('ville');
		$tab ['rue'] = $this->post('rue');
		$tab ['code_postal'] = $this->post('code_postal');

		$tab ['id_pays'] = $this->pays->getid_pays($this->post('nom_pays'));
		//$certificat_residence = NULL;


		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image_link_profile')) {
            return $this->response(array('status' => 'failed image_link_profile',
                                         'error' => true));
        } 
        else {
        	$data = array('upload_data' => $this->upload->data());
            $image_link_profile = site_url().'uploads/profile/'.$this->upload->data('file_name');
        	$udata ['image_link_profile'] = $image_link_profile;

        	$this->upload->initialize($config);
        	if (!$this->upload->do_upload('piece_identite_profile')) {
            return $this->response(array('status' => 'failed piece_identite_profile',
                                         'error' => true));
        } 
        else {
        	$data = array('upload_data' => $this->upload->data());
            $piece_identite_profile = site_url().'uploads/profile/'.$this->upload->data('file_name');
        	$udata ['piece_identite_profile'] = $piece_identite_profile;

        	$result = $this->user_profile->add_user_profile($udata);

        	if($result === FALSE) {
        		$this->response(array('status' => 'user_profile error',
                                      'error' => true));
        	}
        	else {

        		$this->upload->initialize($config);
        		if(!$this->upload->do_upload('certificat_residence')) {
        			//$tab ['certificat_residence'] = $certificat_residence;
                    return $this->response(array('status' => 'error in certificat_residence upload file',
                                                 'error' => true));
        		}
        		else {
        			$data = array('upload_data' => $this->upload->data());
            		$certificat_residence = site_url().'uploads/profile/'.$this->upload->data('file_name');
        			$tab ['certificat_residence'] = $certificat_residence;

        			$res = $this->adresse->add_adresse($tab);
                    if($res === FALSE) {
                        $this->response(array('status' => 'failed at adding adress line',
                                              'error' => true));
                    }
                    else {
                        //tsy mandeha ny insert_id()
                        $id_a = $this->adresse->get_lastinsert_id($certificat_residence);

                        $id_role = 1;

                        $id_user = $udata ['id_user'];

                        $status_pro = 'P';

                         $result = $this->user_data->update_idrole($id_a, $id_role, $id_user, $status_pro);

                        if ($result === FALSE) {
                            $this->response(array('status' => 'failed update id_role and id_adress on profile',
                                                  'error' => true));
                        } else {
                            $this->response(array('status' => 'success add profile and update user_data',
                                                  'error' => false));
                        }

        			    /*$this->response(array( 'status' => 'success added profile',
        									  'error' => false));*/
                    }
        		}
        		/*$this->response(array( 'status' => 'success added profile',
        									  'error' => false));*/
        	}
        }
	}

}
	public function show_profile_get() {
		if (!$this->get('id_user')) {
            $this->response(NULL, 400);
        }

        $profile = $this->user_profile->get_profile_byid($this->get('id_user'));
        if($profile === FALSE) {
            $this->response(array('status' => 'failed, no match profile for your account, create one now',
                                  'error' => true));
        }
        else {
            $id_a = $profile->id_adresse;
            $adresse = $this->adresse->get_adresse_byid($id_a);

            if($adresse === FALSE) {
                $this->response(array('status' => 'failed getting adresse details',
                                      'error' => true));
            }
            else {
            $this->response(array('data' => $profile,
                                  'adresse' => $adresse,
                                  'error' => false));
            }
        }

	}

    /*public function update_userdata_role_post() {
        $id_user = $this->post('id_user');
        $role = $this->post('role');
        $id_role = $this->role->get_role($role);
        $id_adresse = $this->


        $result = $this->user_data->update_idrole($id_role,$id_user);

        if ($result === FALSE) {
            $this->response(array('status' => 'failed update id_role',
                                  'error' => true));
        } else {
            $this->response(array('status' => 'success',
                                  'error' => false));
        }
    }

    /*public function update_userdata_adress_put() {

    }*/

    public function update_userprofile_post() {

        //configuration upload image
        /*$config['upload_path'] = 'uploads/profile';
        $config['allowed_types'] = '*';
        $config['max_size'] = 20480000;
        $config['max_width'] = 8000;
        $config['max_height'] = 8000;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = FALSE;
        $config['max_filename'] = 10;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['mod_mime_fix'] = TRUE;

        $image_link_profile = NULL;
        $piece_identity_profile = NULL;*/

        $id_pro = $this->post('id_profile');

        //data table user_profile
        $pseudo_profile = $this->post('pseudo_profile');
        $nom_profile = $this->post('nom_profile');
        $prenom_profile = $this->post('prenom_profile');
        $contact_profile = $this->post('contact_profile');
        $sexe_profile = $this->post('sexe_profile');
        $date_naiss_profile = $this->post('date_naiss_profile');
        $langue_parle_profile = $this->post('langue_parle_profile');
        $text_marketing_profile = $this->post('text_marketing_profile');
        $coord_bancaire_profile = $this->post('coord_bancaire_profile');

        $id_pays_profile = $this->pays->getid_pays($this->post('nom_pays_profile'));
        
        //data table adresse
        $ville = $this->post('ville');
        $rue = $this->post('rue');
        $code_postal = $this->post('code_postal');

        $tab ['id_pays'] = $this->pays->getid_pays($this->post('nom_pays'));
        

        $res_profile = $this->user_profile->update_user_profile($udata, $id_pro);

        if ($res_profile === FALSE) {
            $this->response(array('error' => true,
                                  'status' => 'failed'));
        } else {
            //$this->response(array('status' => 'success'));
            $res_adr = $this->adresse->update_adresse($tab, $id_a);
            if ($res_adt === FALSE) {
                $this->response(array('error' => true,
                                      'status' => 'failed'));
            } else {
                $this->response(array('error' => false,
                                      'status' => 'tong aty amin adresse'));
            }

        }        

    }
}
?>