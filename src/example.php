<?php

include 'Curl/Request.php';
include 'Curl/Response.php';
include 'Curl/Exceptions.php';
include 'CnbRequest.php';
include 'CnbResponse.php';
include 'CnbCurrency.php';

$request = new \Cnb\CnbRequest();
$response = $request->get();

//Get all downloaded currencies
var_dump($response->getCurrencies());

//Bank identification
var_dump($response->getBank());

//ČNB last change date
var_dump($response->getDate());

//ČNB order number
var_dump($response->getOrder());

//Exchange rate for EUR
var_dump($response->getCurrency("EUR")->getRate());