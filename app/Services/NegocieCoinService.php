<?php

namespace App\Services;

/**
 * Description of NegocieCoinService
 *
 * @author leo
 */
class NegocieCoinService {
    
    /**
     * 
     * @param \App\Services\CurlApiService $curlService
     */
    private $curl;


    public function __construct(CurlApiService $curlService) {
        $this->curl = $curlService;
    }

    public function getApiOrderBookBtcBrl() {
        $url = 'https://broker.negociecoins.com.br/api/v3/btcbrl/orderbook';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }

    public function getApiTickerBtcBrl() {
        $url = 'https://broker.negociecoins.com.br/api/v3/btcbrl/ticker';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }

    public function getApiTradesBtcBrl($initial = null, $final = null) {
        $url = 'https://broker.negociecoins.com.br/api/v3/btcbrl/trades';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }
}
