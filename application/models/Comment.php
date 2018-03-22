<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');
Class Comment extends CI_Model
{

	private $comment = 'comment';

	public function __construct(){
		parent::__construct();
	}

	public function add_comment($data) {
		$this->db->insert($this->comment, $data);
	}
}
?>