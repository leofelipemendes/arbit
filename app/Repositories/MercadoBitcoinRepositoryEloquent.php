<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MercadoBitcoinRepository;
use App\Entities\MercadoBitcoin;
use App\Validators\MercadoBitcoinValidator;

/**
 * Class MercadoBitcoinRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MercadoBitcoinRepositoryEloquent extends BaseRepository implements MercadoBitcoinRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MercadoBitcoin::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MercadoBitcoinValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
