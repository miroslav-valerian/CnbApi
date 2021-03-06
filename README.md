# CnbApi
ČNB exchange rates

Requirements
------------
CnbApi requires PHP 5.3.1 or higher with cUrl extension and Valerian\Curl.

Getting Started
===============

```php

$request = new Valerian\CnbApi\CnbRequest();

//Actual data
$response = $request->get();

//Data for selected day
$date = new \DateTime();
$date->modify("last day of previous month");
$response = $request->get($date);

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

```