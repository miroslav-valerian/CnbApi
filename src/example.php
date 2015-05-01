<?php

$request = new Valerian\Cnb\CnbRequest();
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