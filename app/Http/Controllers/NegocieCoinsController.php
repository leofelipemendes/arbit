<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NegocieCoinCreateRequest;
use App\Http\Requests\NegocieCoinUpdateRequest;
use App\Repositories\NegocieCoinRepository;
use App\Validators\NegocieCoinValidator;
use App\Services\NegocieCoinService;

/**
 * Class NegocieCoinsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NegocieCoinsController extends Controller
{
    /**
     * @var NegocieCoinRepository
     */
    protected $repository;
    
    /**
     * @var NegocieCoinService
     */
    protected $service;

    /**
     * @var NegocieCoinValidator
     */
    protected $validator;

    /**
     * NegocieCoinsController constructor.
     *
     * @param NegocieCoinRepository $repository
     * @param NegocieCoinValidator $validator
     */
    public function __construct(NegocieCoinRepository $repository, NegocieCoinValidator $validator,NegocieCoinService $service)
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
