<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TickerRepository;
use App\Entities\Ticker;
use App\Validators\TickerValidator;

/**
 * Class TickerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TickerRepositoryEloquent extends BaseRepository implements TickerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ticker::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TickerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
