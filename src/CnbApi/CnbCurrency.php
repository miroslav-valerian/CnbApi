<?php

/**
 * CnbCurrency
 * 
 * @author Ing. Miroslav Valerián <info@miroslav-valerian.cz>
 * 
 */

namespace Valerian\CnbApi;

use SimpleXMLElement;

class CnbCurrency
{
	/** @var string */
	private $code;
	
	/** @var string */
	private $currency;
	
	/** @var int */
	private $amount;
	
	/** @var float */
	private $exchangeRate;
	
	/** @var string */
	private $country;
	
	/**
	 * 
	 * @param SimpleXMLElement $xml
	 */
	public function __construct(array $xml)
	{
		$this->code = (string) $xml['kod'];
		$this->currency = (string) $xml['mena'];
		$this->amount = (int) $xml['mnozstvi'];
		$this->exchangeRate = (float) str_replace(',', '.', $xml['kurz']);
		$this->country = (string) $xml['zeme'];
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * 
	 * @return string
	 */
	public function getCurrency()
	{
		return $this->currency;
	}

	/**
	 * 
	 * @return int
	 */
	public function getAmount()
	{
		return $this->amount;
	}
	
	/**
	 * 
	 * @return float
	 */
	public function getExchangeRate()
	{
		return $this->exchangeRate;
	}
	
	/**
	 * 
	 * @return float
	 */
	public function getRate()
	{
		return $this->exchangeRate / $this->amount;
	}

	/**
	 * 
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
	}
}
