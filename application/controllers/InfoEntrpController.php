<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class InfoEntrpController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function add_infoentrp_post() {

		//config base upload
		$config['upload_path'] = 'uploads/info_pro';
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

        $image_link_piece_identity = NULL;
        $acte_constitution_society = NULL;

		//formulaire table info_pro
		$udata ['pseudo_info'] = $this->post('pseudo_info');
		$udata ['nom_dirigeant'] = $this->post('nom_dirigeant');
		$udata ['prenom_dirigeant'] = $this->post('prenom_dirigeant');
		$udata ['numero_tva'] = $this->post('numero_tva');
		$udata ['telephone'] = $this->post('telephone');
		$udata ['coord_bancaire_society'] = $this->post('coord_bancaire_society');
		$udata ['id_user'] = $this->post('id_user');

		//data table adresse
		$tab ['ville'] = $this->post('ville');
		$tab ['rue'] = $this->post('rue');
		$tab ['code_postal'] = $this->post('code_postal');

		$tab ['id_pays'] = $this->pays->getid_pays($this->post('nom_pays'));
		//$certificat_residence = NULL;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image_link_piece_identity')) {
            return $this->response(array('status' => 'failed image_link_piece_identity',
                                         'error' => true));
        } 
        else {
        	$data = array('upload_data' => $this->upload->data());
            $image_link_profile = site_url().'uploads/info_pro/'.$this->upload->data('file_name');
        	$udata ['image_link_piece_identity'] = $image_link_piece_identity;

        	$this->upload->initialize($config);
        	if (!$this->upload->do_upload('acte_constitution_society')) {
            	return $this->response(array('status' => 'failed acte_constitution_society'));
	        } 
	        else {
	        	$data = array('upload_data' => $this->upload->data());
            $image_link_piece_identity = site_url().'uploads/info_pro/'.$this->upload->data('file_name');
        	$udata ['image_link_piece_identity'] = $image_link_piece_identity;

        	$result = $this->information_entreprise->add_information($udata);

        	if($result === FALSE) {
        		//$this->response(array('error' => true));
                return $this->response(array('status' => 'error in add information',
                                                 'error' => true));
        	}
        	else {
        		//$this->response(array('error' => false));
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

                        $status_pro = 'E';

                         $result = $this->user_data->update_idrole($id_a, $id_role, $id_user, $status_pro);

                        if ($result === FALSE) {
                            $this->response(array('status' => 'failed update id_role and id_adress on profile',
                                                  'error' => true));
                        } else {
                            $this->response(array('status' => 'success add information and update user_data',
                                                  'error' => false));
                        }

        		}
        	}
	        }
        }
    }
}

	public function show_infoentrp_get() {
		if (!$this->get('id_user')) {
            $this->response(NULL, 400);
        }

        $entreprise = $this->information_entreprise->get_information_byid($this->get('id_user'));
        if($entreprise === FALSE) {
            $this->response(array('status' => 'failed, no match profile for your account, create one now',
                                  'error' => true));
        }
        else {
            $this->response(array('data' => $entreprise,
                                  'error' => false));
        }
	}
}
?>