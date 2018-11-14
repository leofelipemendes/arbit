<?php
namespace App\Services;

use App\Services\CurlApiService;

/**
 * Description of NegocieCoinService
 *
 * @author leo
 */
class BitCoinTradeService {
    
    /**
     * 
     * @param \App\Services\CurlApiService $curlService
     */
    private $curl;


    public function __construct(CurlApiService $curlService) {
        $this->curl = $curlService;
    }

    public function getApiOrderBookBtcBrl() {
        $url = 'https://api.bitcointrade.com.br/v1/public/BTC/orders';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }

    public function getApiTickerBtcBrl() {
        $url = 'https://api.bitcointrade.com.br/v1/public/BTC/ticker';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }

    public function getApiTradesBtcBrl($initial = null, $final = null) {
        //$url = 'https://api.bitcointrade.com.br/v1/public/BTC/trades?start_time=2016-10-01T00:00:00-03:00&end_time=2018-10-10T23:59:59-03:00&page_size=100&current_page=1';
        $url = 'https://api.bitcointrade.com.br/v1/public/BTC/trades';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }

}
