<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class test extends CI_Model
{

	private $test = 'test';

	public function __construct(){
		parent::__construct();
	}

	public function add_batch($data) {
		$this->db->insert_batch('test', $data);
	}
}
?>