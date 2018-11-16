<?php
namespace App\Services;

use App\Services\CurlApiService;

/**
 * Description of NegocieCoinService
 *
 * @author leo
 */
class MercadoBitcoinService {
    
    /**
     * 
     * @param \App\Services\CurlApiService $curlService
     */
    private $curl;


    public function __construct(CurlApiService $curlService) {
        $this->curl = $curlService;
    }

    public function getApiOrderBookBtcBrl() {
        $url = 'https://www.mercadobitcoin.net/api/BTC/orderbook/';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }

    public function getApiTickerBtcBrl() {
        $url = 'https://www.mercadobitcoin.net/api/BTC/ticker/';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }

    public function getApiTradesBtcBrl($initial = null, $final = null) {
        //$url = 'https://api.bitcointrade.com.br/v1/public/BTC/trades?start_time=2016-10-01T00:00:00-03:00&end_time=2018-10-10T23:59:59-03:00&page_size=100&current_page=1';
        //$url = https://www.mercadobitcoin.net/api/BTC/trades/?tid=5700
        //$url = https://www.mercadobitcoin.net/api/BTC/trades/?since=5700
        //$url = https://www.mercadobitcoin.net/api/BTC/trades/1501871369/
        //$url =https://www.mercadobitcoin.net/api/BTC/trades/1501871369/1501891200/
        $url = 'https://www.mercadobitcoin.net/api/BTC/trades/';
        $response = $this->curl->getCurlApi($url);
        return $response;
    }
    
    public function getApiDaySummary() {
        //https://www.mercadobitcoin.net/api/coin/day-summary/<year>/<month>/<day>/
        $data = date("Y/m/d",strtotime("-1 day",strtotime("now")));
        
        $url = 'https://www.mercadobitcoin.net/api/BTC/day-summary/'.$data.'/';
        
        $response = $this->curl->getCurlApi($url);
        
        return $response;
    }

}
