<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class User_data extends CI_Model
{

	private $user_data = 'user_data';

	public function __construct(){
		parent::__construct();
	}

	public function view_mail_user($email){//$email
       $query = $this->db->select('*')->from($this->user_data)->where('email', $email)->get();
       $nb = $query->num_rows();
       if ($nb == 0) {
                return 'true';
            } else {
                return 'false';
            }
    }

    public function add_user($email, $salt, $password_encrypted, $id_role) {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $a = mdate($datestring, $time);
				$shourtcode = mt_rand(100000, 999999);
				//sent mailtype
				$this->email->set_newline("\r\n");

        $this->email->from('luxtrot@gmail.com', 'kim&yoko');
        $this->email->to($email);
        $this->email->subject('Sign in to luxtrot');
        $this->email->message('Welcome <strong>'.$email.'</strong>.<br>Enter this shourtcode to activete your account and receive our notification : <strong>'.$shourtcode.'</strong>.');
				$this->email->send();

        $data = array('email' => $email,
        			  'salt' => $salt,
        			  'password_encrypted' => $password_encrypted,
        			  'date_creation' => $a,
                'id_role' => $id_role,
								'shourtcode' => $shourtcode);
        $this->db->insert($this->user_data, $data);
    }

    public function auth_user($email, $password_encrypted) {

        $query = $this->db->select('id_role')
				->from($this->user_data)
				->where('email', $email)
				->where('password_encrypted', $password_encrypted)
				->where('active', "1")->get();
        $nb = $query->num_rows();
        $result = $query->row();

        if ($nb == 0) {
            return 'failed';
        } else {

            $i = $result->id_role;
            if ($i == 1) {
                return 'kim';
            } elseif ($i == 2) {
                    return 'yoko';
                }
                else {
                    return 'tsy izy';
                }
        }
    }

    public function getmail_user($id_user) {
        $query = $this->db->select('email')->from('user_data')->where('id_user', $id_user)->get();
        $result = $query->row();
        $nb_query = $query->num_rows();

        if($nb_query == 1) {
            $mail_u = $result->email;
            return $mail_u;
        } else {
            $mail_u = 0;
            return $mail_u;
        }
    }

    public function getid_user($email) {
        $query = $this->db->select('id_user')->from('user_data')->where('email', $email)->get();
        $result = $query->row();
        $nb_query = $query->num_rows();

        if($nb_query == 1) {
            $id_u = $result->id_user;
            return $id_u;
        } else {
            $id_u = 0;
            return $id_u;
        }
    }

    public function update_idrole($id_adresse, $id_role, $id_user, $status_pro) {
        //$this->db->where('id_user', $id_user)->update($this->user_data, $id_role);
        $sql = "UPDATE user_data SET id_role = $id_role, id_adresse = $id_adresse, status_pro = '$status_pro' WHERE id_user = $id_user";
        $query = $this->db->query($sql);
    }

		public function update_shortcode($email) {
        //$this->db->where('id_user', $id_user)->update($this->user_data, $id_role);
				$shourtcode = mt_rand(100000, 999999);
				$this->email->set_newline("\r\n");

        $this->email->from('luxtrot@gmail.com', 'kim&yoko');
        $this->email->to($email);
        $this->email->subject('Sign in to luxtrot');
        $this->email->message('Welcome <strong>'.$email.'</strong>.<br>Enter this shourtcode to update your password and receive our notification : <strong>'.$shourtcode.'</strong>.');
				$this->email->send();

        $sql = "UPDATE user_data SET  shourtcode = $shourtcode WHERE email = '$email' ";
        $query = $this->db->query($sql);
    }

		public function update_active_user($email, $shourtcode) {
			$sql = "UPDATE user_data SET active = 1 WHERE email = '$email' AND shourtcode = $shourtcode";
			$query = $this->db->query($sql);
		}
		public function update_password_user($email, $shourtcode,$password_encrypted,$salt) {
			$sql = "UPDATE user_data SET password_encrypted = '$password_encrypted', salt = '$salt' WHERE email = '$email' AND shourtcode = $shourtcode";
			$query = $this->db->query($sql);
		}
    public function get_id_adresse($id_user) {
        $query = $this->db->select('id_adresse')->from('user_data')->where('id_user', $id_user)->get();
        $result = $query->row();
        $nb_query = $query->num_rows();

        if ($nb_query == 1) {
            $id_a = $result->id_adresse;
            return $id_a;
        } else {
            $id_a = 0;
            return $id_a;
        }
    }

		public function register_shourtcode_user($email, $shourtcode) {
			$query = $this->db->select('id_role')->from($this->user_data)->where('email', $email)->where('shourtcode', $shourtcode)->get();
			$nb = $query->num_rows();
			$result = $query->row();

			if ($nb == 0) {
					return 'failed';
			} else {

					$i = $result->id_role;
					if ($i == 1) {
							return 'kim';
					} elseif ($i == 2) {
									return 'yoko';
							}
							else {
									return 'tsy izy';
							}
			}
		}
		public function login_shourtcode_user($email, $shourtcode) {
			$query = $this->db->select('id_role')->from($this->user_data)->where('email', $email)->where('shourtcode', $shourtcode)->get();
			$nb = $query->num_rows();
			$result = $query->row();

			if ($nb == 0) {
					return 'failed';
			} else {

					$i = $result->id_role;
					if ($i == 1) {
							return 'kim';
					} elseif ($i == 2) {
									return 'yoko';
							}
							else {
									return 'tsy izy';
							}
			}
		}

}
?>
