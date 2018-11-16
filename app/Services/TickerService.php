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
    public function getApiTicker() {
        $mercadobitcoin = $this->mercadoBitcoinService->getApiTickerBtcBrl();
        return $mercadobitcoin;
    }

}
