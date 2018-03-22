<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Role extends CI_Model
{

	private $role = 'role';

	public function __construct(){
		parent::__construct();
	}

	public function get_role($type_role) {
		$query = $this->db->select('*')->from($this->role)->where('type_role', $type_role)->get();
    	$result = $query->row();
    	$nb_query = $query->num_rows();

    	if($nb_query == 1) {
    		$id_r = $result->id_role;
    		return $id_r;
    	} else {
    		$id_r = 0;
    		return $id_r;
    	}
	}

    public function list_role() {
        $query = $this->db->select('*')->from($this->role)->get();
        if ($query) {
            return $query->result();
        }
        return NULL;
    }
}
?>