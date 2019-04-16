<?php

/**
 * Response
 *
 * @author Ing. Miroslav Valerián <info@miroslav-valerian.cz>
 *
 */

namespace Valerian\CnbApi;

use function array_filter;
use Exception;
use function array_keys;

class CnbResponse
{

	private $response;

	private $data = [];

	/**
	 *
	 * @param \Valerian\Curl\Response $response
	 */
	public function __construct(\Valerian\Curl\Response $response)
	{
		$this->response = $response;
		$rows = array_filter(explode("\n", $this->response->getResponse()));
		array_shift($rows);
		array_shift($rows);

		foreach ($rows as $row => $data) {
			$row_data = explode('|', $data);
			$this->data[$row_data[3]] = array_combine(['zeme', 'mena', 'mnozstvi', 'kod', 'kurz'], $row_data);
		}
	}

	/**
	 *
	 * @return array
	 */
	public function getCurrencies()
	{
		return array_keys($this->data);
	}

	/**
	 *
	 * @param string $code
	 * @return \Valerian\CnbApi\CnbCurrency
	 * @throws Exception
	 */
	public function getCurrency($code)
	{
		if ($this->data[$code]) {
			return new CnbCurrency($this->data[$code]);
		}
		throw new Exception("Currency not exist");
	}
}
