<?php

include_once __DIR__ . '/../../vendor/autoload.php';

$request = new Valerian\CnbApi\CnbRequest();

//Actual data
$response = $request->get();

//Data for selected day
$date = new \DateTime();
$date->modify("last day of previous month");
$response = $request->get($date);

//Get all downloaded currencies
var_dump($response->getCurrencies());

//Exchange rate for EUR
var_dump($response->getCurrency("EUR")->getRate());