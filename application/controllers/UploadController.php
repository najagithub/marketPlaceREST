<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');

class UploadController extends REST_Controller {

    function __construct() {
        parent:: __construct();
    }

    public function index() {
        
    }

    public function do_upload_post() {


        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048000;
        $config['max_width'] = 4000;
        $config['max_height'] = 8000;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = FALSE;
        $config['max_filename'] = 10;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['mod_mime_fix'] = TRUE;
      
        $this->upload->initialize($config);

//userfile_pple userfile1 userfile2 userfile3 upload
        if (!$this->upload->do_upload('userfile_pple') && !$this->upload->do_upload('userfile2') && !$this->upload->do_upload('userfile3')) {
            return $this->response(array('status' => 'failed'));
        } else {
            //$data = array('upload_data' => $this->upload->data());
            $data = array('upload_data' => $this->upload->data());
            //$nom_image = $data['file_name'];
            //return $this->response(array('status' => site_url().'/'.$config['upload_path'].'/'.$config['file_name'].'.'.$config['allowed_types']));
            $url_pple = $this->upload->data('full_path');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('userfile1')) {
                return $this->response(array('status' => 'failed'));
            } else {
                $data = array('upload_data' => $this->upload->data());
                $url1 = $this->upload->data('full_path');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('userfile2')) {
                    return $this->response(array('status' => 'failed'));
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $url2 = $this->upload->data('full_path');
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('userfile3')) {
                        return $this->response(array('status' => 'failed'));
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $url3 = $this->upload->data('full_path');
                        
                        /*return $this->response(array('url_pple' => $url_pple,
                            'url1' => $url1,
                            'url2' => $url2,
                            'url3' =>$url3));*/

            

            $dat['link_image_pple'] = $url_pple;
            $dat['link_image_1'] = $url1;
            $dat['link_image_2'] = $url2;
            $dat['link_image_3'] = $url3;

            $image_base = $this->image_produit->add_image_produit($dat);

            if ($image_base === FALSE) {
            $this->response(array('status' => 'failed insert url image',
                                  'error' => true));
        } else {
            $this->response(array('status' => 'success insert url image',
                                  'url_pple' => $url_pple,
                                  'url1' => $url1,
                                  'url2' => $url2,
                                  'url3' =>$url3,
                                  'error' => false));
                }


                    }
                }
            }

            

            //$id_img = $this->image_produit->getid_image($url_pple, $url1);
            
            return $this->response(array('status' => 'success'));
        }
    }

}

?>