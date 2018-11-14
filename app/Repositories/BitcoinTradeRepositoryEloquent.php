<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BitcoinTradeRepository;
use App\Entities\BitcoinTrade;
use App\Validators\BitcoinTradeValidator;

/**
 * Class BitcoinTradeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BitcoinTradeRepositoryEloquent extends BaseRepository implements BitcoinTradeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BitcoinTrade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BitcoinTradeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
