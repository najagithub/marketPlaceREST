<?php

if ( ! defined ('BASEPATH')) exit ('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');
require(APPPATH . '/libraries/mangopay2-php-sdk-master/MangoPay/Autoloader.php');

class MangopayController extends REST_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function paiement_post() {
	
	$amount_test = $this->post('test');
	try {
	$Transfer = new \MangoPay\Transfer();
	$Transfer->Tag = "custom meta";
	$Transfer->AuthorId = "8494514";
	$Transfer->CreditedUserId = "8494514";
	$Transfer->DebitedFunds = new \MangoPay\Money();
	$Transfer->DebitedFunds->Currency = "EUR";
	$Transfer->DebitedFunds->Amount = $amount_test; //12
	$Transfer->Fees = new \MangoPay\Money();
	$Transfer->Fees->Currency = "EUR";
	$Transfer->Fees->Amount = $amount_test; //12
	$Transfer->DebitedWalletId = "8519987";
	$Transfer->CreditedWalletId = "8494559";

	$Result = $Api->Transfers->Create($Transfer);

	} 
	catch(MangoPay\Libraries\ResponseException $e) {
	// handle/log the response exception with code $e->GetCode(), message $e->GetMessage() and error(s) $e->GetErrorDetails()

	} catch(MangoPay\Libraries\Exception $e) {
	// handle/log the exception $e->GetMessage()
		}
}

}
?>