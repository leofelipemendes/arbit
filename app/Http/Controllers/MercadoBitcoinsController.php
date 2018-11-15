<?php

namespace App\Http\Controllers;

use App\Repositories\MercadoBitcoinRepository;
use App\Validators\MercadoBitcoinValidator;
use App\Services\MercadoBitcoinService;

/**
 * Class MercadoBitcoinsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MercadoBitcoinsController extends Controller {

    /**
     * @var MercadoBitcoinRepository
     */
    protected $repository;

    /**
     * @var MercadoBitcoinValidator
     */
    protected $validator;

    /**
     * @var MercadoBitcoinService
     */
    protected $service;

    /**
     * MercadoBitcoinsController constructor.
     *
     * @param MercadoBitcoinRepository $repository
     * @param MercadoBitcoinValidator $validator
     */
    public function __construct(MercadoBitcoinRepository $repository, MercadoBitcoinValidator $validator, MercadoBitcoinService $service) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->service = $service;
    }

    public function getTickerBtcBrl() {
        $mercadobitcoin = json_decode($this->service->getApiTickerBtcBrl(), true);
        return $mercadobitcoin;

        //return view('negocieCoins.index', compact('negocieCoins'));
    }

    public function getOrderBookBtcBrl() {
        $mercadobitcoin = json_decode($this->service->getApiOrderBookBtcBrl(), true);
        return $mercadobitcoin;
    }

    public function getTradesBtcBrl() {
        $mercadobitcoin = json_decode($this->service->getApiTradesBtcBrl(), true);
        return $mercadobitcoin;
    }
    
    public function getDaySummary() {
        $mercadobitcoin = json_decode($this->service->getApiDaySummary(), true);
        
        return $mercadobitcoin;
    }

}
