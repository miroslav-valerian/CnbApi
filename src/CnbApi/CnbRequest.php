<?php

/**
 * Request
 *
 * @author Ing. Miroslav Valerián <info@miroslav-valerian.cz>
 *
 */

namespace Valerian\CnbApi;

use Valerian\Curl\Request;
use DateTime;

class CnbRequest
{
    const CNB_URL = 'http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.xml';

    /**
     *
     * @param string $url
     */
    public function __construct($url = null)
    {
        if ($url) {
            $this->url = $url;
        } else {
            $this->url = self::CNB_URL;
        }
    }

    /**
     * @param DateTime|null $date
     * @return CnbResponse
     *
     */
    public function get(DateTime $date = null)
    {
        $urlParams = null;
        if ($date) {
            $urlParams['date'] = $date->format('d.m.Y');
        }
        if ($urlParams) {
            $urlParams = '?'.http_build_query($urlParams);
        }
        $request = new Request($this->url.$urlParams);
        $response = $request->get();
        $cnbResponse = new CnbResponse($response);
        return $cnbResponse;
    }
}
