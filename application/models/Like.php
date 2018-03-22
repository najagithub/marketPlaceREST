<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Like extends CI_Model
{

	private $like = 'like';

	public function __construct(){
		parent::__construct();
	}

	public function add_like($data) {
		$this->db->insert($this->like, $data);
	}

	public function count_like($id_produit) {
		$query = $this->db->select('*')->from($this->like)->where('id_produit',"$id_produit")->num_rows();
		return $query;
	}
}
?>