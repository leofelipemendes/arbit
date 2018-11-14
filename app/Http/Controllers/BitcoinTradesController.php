<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BitcoinTradeCreateRequest;
use App\Http\Requests\BitcoinTradeUpdateRequest;
use App\Repositories\BitcoinTradeRepository;
use App\Validators\BitcoinTradeValidator;
use \App\Services\BitCoinTradeService;

/**
 * Class BitcoinTradesController.
 *
 * @package namespace App\Http\Controllers;
 */
class BitcoinTradesController extends Controller
{
    /**
     * @var BitcoinTradeRepository
     */
    protected $repository;

    /**
     * @var BitcoinTradeValidator
     */
    protected $validator;
    /**
     * @var BitCoinTradeService
     */
    protected $service;

    /**
     * BitcoinTradesController constructor.
     *
     * @param BitcoinTradeRepository $repository
     * @param BitcoinTradeValidator $validator
     */
    public function __construct(BitcoinTradeRepository $repository, BitcoinTradeValidator $validator, BitCoinTradeService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $service;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTickerBtcBrl()
    {
        $negocieCoins = json_decode($this->service->getApiTickerBtcBrl(),true);
        return $negocieCoins;
  
        //return view('negocieCoins.index', compact('negocieCoins'));
    }
    
    public function getOrderBookBtcBrl()
    {
        $negocieCoins = json_decode($this->service->getApiOrderBookBtcBrl(),true);
        return $negocieCoins;                
    }
    
    public function getTradesBtcBrl()
    {
        $negocieCoins = json_decode($this->service->getApiTradesBtcBrl(),true);
        return $negocieCoins;                
    }
}
