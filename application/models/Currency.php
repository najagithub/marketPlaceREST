<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Currency extends CI_Model
{
  public function getallCurrency()
  {
    $query=$this->db->get_where('currency',array('symbol!='=>'','hex!='=>''));
    return $query->result();
  }
}
?>