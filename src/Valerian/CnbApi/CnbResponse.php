<?php

/**
 * Response
 * 
 * @author Ing. Miroslav Valerián <info@miroslav-valerian.cz>
 * 
 */

namespace Valerian\CnbApi;

use SimpleXMLElement;
use Exception;
use DateTime;

class Response
{
	private $response;
	
	/** @var SimpleXMLElement */
	private $xml;
	
	/** @var string */
	private $bank;
	
	/** @var DateTime */
	private $date;
	
	/** @var int */
	private $order;
	
	/**
	 * 
	 * @param \Curl\Response $response
	 */
	public function __construct(\Curl\Response $response)
	{
    	$this->response = $response;
		$this->xml = new SimpleXMLElement($this->response->getResponse());
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getXml()
	{
		return (string) $this->xml;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getBank()
	{
		return (string) $this->xml['banka'];
	}
	
	/**
	 * 
	 * @return DateTime
	 */
	public function getDate()
	{
		return new DateTime((string)$this->xml['datum']);
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getOrder()
	{
		return (string) $this->xml['poradi'];
	}
	
	/**
	 * 
	 * @return array
	 */
	public function getCurrencies()
	{
		$code = array();
		foreach ($this->xml->tabulka->radek as $line){
			$code[] = (string) $line['kod'];
		}
		return $code;
	}
	
	/**
	 * 
	 * @param type $code
	 * @return \Valerian\Cnb\CnbCurrency
	 * @throws Exception
	 */
	public function getCurrency($code)
	{
		$xmlCode = array();
		foreach ($this->xml->tabulka->radek as $line){
			$xmlCode = (string) $line['kod'];
			if ($code == $xmlCode) {
				return new CnbCurrency($line);
			}
		}
		throw new Exception("Currency not exist");
	}
}
