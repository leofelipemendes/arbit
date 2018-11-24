<?php

namespace App\Services;

use App\Services\BitCoinTradeService;
use App\Services\MercadoBitcoinService;
use App\Services\NegocieCoinService;

/**
 * Description of TickerService
 *
 * @author Leo
 */
class TickerService {

    /**
     * date: timestamp da última atualização do ticker.
     * sell: valor atual em Reais ofertado para venda.
     * buy: valor atual em Reais ofertado para compra.
     * last: último valor em Reais negociado.
     * high: maior valor em Reais de negociação das últimas 24 horas.
     * low: menor valor em Reais de negociação das últimas 24 horas.
     * vol: volume da moeda negociada nas últimas 24 horas.
     */
    
    private $bitcoinTradeService;
    private $mercadoBitcoinService;
    private $negocieCoinService;


    public function __construct(BitCoinTradeService $bitcoinTradeService,MercadoBitcoinService $mercadoBitcoinService,NegocieCoinService $negocieCoinService) {
        $this->bitcoinTradeService = $bitcoinTradeService;
        $this->mercadoBitcoinService = $mercadoBitcoinService;
        $this->negocieCoinService = $negocieCoinService;
    }
    /**
     * calculo do spread 
     * ((vl maior - vl menor) / vl menor) * 100
     * 
     */
    
    public function getApiTicker() {
        $retorno = array();
        $mercadobitcoin = json_decode($this->mercadoBitcoinService->getApiTickerBtcBrl());
        
        $dadosMercadoBitcoin = ['mercadobitcoin'=>[
            'date' => date('Y-m-d H:i:s', $mercadobitcoin->ticker->date),
            'last' => $mercadobitcoin->ticker->last,
            'high' => $mercadobitcoin->ticker->high,
            'low' => $mercadobitcoin->ticker->low,
            'buy' => $mercadobitcoin->ticker->buy,
            'sell' => $mercadobitcoin->ticker->sell,
            'spread' => round((($mercadobitcoin->ticker->sell- $mercadobitcoin->ticker->buy) / $mercadobitcoin->ticker->buy) * 100,2),
            'vol' => $mercadobitcoin->ticker->vol,
        ]];
        $bitcoinTradeService = json_decode($this->bitcoinTradeService->getApiTickerBtcBrl());
        
        $dadosBitcoinTrade = ['bitcoinTrade'=>[
            'date' => date('Y-m-d H:i:s', strtotime($bitcoinTradeService->data->date)),
            'last' => $bitcoinTradeService->data->last,
            'high' => $bitcoinTradeService->data->high,
            'low' => $bitcoinTradeService->data->low,
            'buy' => $bitcoinTradeService->data->buy,
            'sell' => $bitcoinTradeService->data->sell,
            'spread' => round((($bitcoinTradeService->data->sell- $bitcoinTradeService->data->buy) / $bitcoinTradeService->data->buy) * 100,2),
            'vol' => $bitcoinTradeService->data->volume,
        ]];
        
        $negocieCoinService = json_decode($this->negocieCoinService->getApiTickerBtcBrl());
        $dadosNegocieCoin = ['negocieCoin'=>[
            'date' => date('Y-m-d H:i:s', $negocieCoinService->date),
            'last' => $negocieCoinService->last,
            'high' => $negocieCoinService->high,
            'low' => $negocieCoinService->low,
            'buy' => $negocieCoinService->buy,
            'sell' => $negocieCoinService->sell,
            'spread' => round((($negocieCoinService->sell- $negocieCoinService->buy) / $negocieCoinService->buy) * 100,2),
            'vol' => $negocieCoinService->vol,
        ]];
        array_push($retorno, $dadosBitcoinTrade);
        array_push($retorno, $dadosMercadoBitcoin);
        array_push($retorno, $dadosNegocieCoin);
        
        return json_encode($retorno);
    }

}
