<?php

/**
 * Request
 * 
 * @author Ing. Miroslav Valerián <info@miroslav-valerian.cz>
 * 
 */

namespace Valerian\CnbApi;

use Valerian\Curl\Request;

class CnbRequest extends Request
{
	const CNB_URL = 'http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.xml';
	
	/**
	 * 
	 * @param string $url
	 */
	public function __construct($url = null)
	{
		parent::__construct($url);
		if ($url) {
			$this->url = $url;
		} else {
			$this->url = self::CNB_URL;
		}
	}

	/**
	 * @return \Curl\Response
	 */
	protected function send()
	{
		$response = parent::send();
		$cnbResponse = new CnbResponse($response);
		return $cnbResponse;
	}
}
