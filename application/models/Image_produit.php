<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class image_produit extends CI_Model
{

	private $image_produit = 'image_produit';

	public function __construct(){
		parent::__construct();
	}

	public function add_image_produit($data) {
		$this->db->insert($this->image_produit, $data);
		
	}

	public function getid_image($url_pple) {
		$query = $this->db->select('id_image_produit')->from($this->image_produit)->where('link_image_pple', $url_pple)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

		if($nb_query == 1) {
			$id_i = $result->id_image_produit;
			return $id_i;
		} else {
			return 'false';
		}
	}

	public function get_urlpple_image($id_image_produit) {
		$query = $this->db->select('link_image_pple')->from($this->image_produit)->where('id_image_produit', $id_image_produit)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

		if($nb_query == 1) {
			$url_pple = $result->link_image_pple;
			return $url_pple;
		} else {
			return 'false';
		}
	}

	public function get_url1_image($id_image_produit) {
		$query = $this->db->select('link_image_1')->from($this->image_produit)->where('id_image_produit', $id_image_produit)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

		if($nb_query == 1) {
			$url1 = $result->link_image_1;
			return $url1;
		} else {
			return 'false';
		}
	}

	public function get_url2_image($id_image_produit) {
		$query = $this->db->select('link_image_2')->from($this->image_produit)->where('id_image_produit', $id_image_produit)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

		if($nb_query == 1) {
			$url2 = $result->link_image_2;
			return $url2;
		} else {
			return 'false';
		}
	}

	public function get_url3_image($id_image_produit) {
		$query = $this->db->select('link_image_3')->from($this->image_produit)->where('id_image_produit', $id_image_produit)->get();
		$result = $query->row();
		$nb_query = $query->num_rows();

		if($nb_query == 1) {
			$url3 = $result->link_image_3;
			return $url3;
		} else {
			return 'false';
		}
	}
}
?>