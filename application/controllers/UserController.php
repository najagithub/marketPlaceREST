<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class UserController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	function add_user_post(){

        $email = $this->post('email'); //"mahery"
        $salt = md5($this->post('password'));
        $password_encrypted = md5($salt . '' . $this->post('password'));
        $id_role = 3;
        $bool = $this->user_data->view_mail_user($email);

        if ($bool === 'true') {
            $result = $this->user_data->add_user($email, $salt, $password_encrypted, $id_role);
            if ($result === FALSE) {
                $this->response(array('status' => 'failed',
            						  'error' => true));
            } else {
                $this->response(array('status' => 'success',
            						  'error' => false));
            }
        } else {
            $this->response(array('status' => 'failed, email already exists',
        						  'error' => true));
        }
    	//}
	}

	function mail_post() {
		$email = $this->post('email');
		$amount = $this->post('amount');
		$this->email->set_newline("\r\n");

		$this->email->from('luxtrot@gmail.com', 'kim&yoko');
		$this->email->to($email);
		$this->email->subject('Luxtrot');
		$this->email->message('Hello <strong>'.$email.'</strong>.<br><strong>'.$amount.' $</strong> was retired in your account');

		if ($this->email->send()) {
			return $this->response(array('status' => 'email sent',
																	 'error' => false));
		}
	}
	function mailing_register_post() {
		$email = $this->post('email');
		$shourtcode = $this->post('shourtcode');
		$result = $this->user_data->register_shourtcode_user($email, $shourtcode);
		if ($result == 'failed') {
				return $this->response(array('status' => 'shourtcode incorrect',
																		 'error' => true));
		} else {
				$this->user_data->update_active_user($email, $shourtcode);
				$res_id = $this->user_data->getid_user($email);

				if ($result == 'yoko') {
						return $this->response(array('status' => 'success yoko',
												 'error' => false,
												 'role' => 'yoko',
												 'email' => $email,
																				 'id_user' => $res_id));
				} else {
						if ($result == 'kim') {
								return $this->response(array('status' => 'success kim',
																				 'error' => false,
																				 'role' => 'kim',
																				 'email' => $email,
																				 'id_user' => $res_id));
						}
						else {
								return $this->response(array('status' => 'success fa sans role',
												 'error' => false,
												 'role' => 'sans role',
												 'email' => $email,
																				 'id_user' => $res_id));
						}
				}
		}
	}
  function mail_checker_post() {
		$email = $this->post('email');
		$res_id = $this->user_data->getid_user($email);
		if (!$res_id){
			return $this->response(array('status' => 'email  incorrect',
																	 'error' => true));
		}else {
			$this->user_data->update_shortcode($email);
			return $this->response(array('status' => 'shourtcode generated',
																	 'error' => false));
		}
	}
	function forgot_post() {
		$email = $this->post('email');
		$shourtcode = $this->post('shourtcode');
		$result = $this->user_data->login_shourtcode_user($email, $shourtcode);//mbola tsi ok
		$salt = md5($this->post('password'));
		$password_encrypted = md5($salt . '' . $this->post('password'));
		if ($result == 'failed') {
				return $this->response(array('status' => 'shourtcode incorrect',
																		 'error' => true));
		} else {
				$this->user_data->update_password_user($email, $shourtcode, $password_encrypted, $salt);
				$res_id = $this->user_data->getid_user($email);

				if ($result == 'yoko') {
						return $this->response(array('status' => 'success yoko',
												 'error' => false,
												 'role' => 'yoko',
												 'email' => $email,
																				 'id_user' => $res_id));
				} else {
						if ($result == 'kim') {
								return $this->response(array('status' => 'success kim',
																				 'error' => false,
																				 'role' => 'kim',
																				 'email' => $email,
																				 'id_user' => $res_id));
						}
						else {
								return $this->response(array('status' => 'success fa sans role',
												 'error' => false,
												 'role' => 'sans role',
												 'email' => $email,
																				 'id_user' => $res_id));
						}
				}
		}
	}
	function auth_post() {

        $email = $this->post('email');
        $salt = md5($this->post('password'));
        $password_encrypted = md5($salt . '' . $this->post('password'));

        $result = $this->user_data->auth_user($email, $password_encrypted);


        if ($result == 'failed') {
            return $this->response(array('status' => 'email or password incorrect',
                                         'error' => true));
        } else {

            $res_id = $this->user_data->getid_user($email);

            if ($result == 'yoko') {
                return $this->response(array('status' => 'success yoko',
            								 'error' => false,
            								 'role' => 'yoko',
            								 'email' => $email,
                                             'id_user' => $res_id));
            } else {
                if ($result == 'kim') {
                    return $this->response(array('status' => 'success kim',
                                             'error' => false,
                                             'role' => 'kim',
                                             'email' => $email,
                                             'id_user' => $res_id));
                }
                else {
                    return $this->response(array('status' => 'success fa sans role',
            								 'error' => false,
            								 'role' => 'sans role',
            								 'email' => $email,
                                             'id_user' => $res_id));
                }
            }
        }
    }
}
?>
