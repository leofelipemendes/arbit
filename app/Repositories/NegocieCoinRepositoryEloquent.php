<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NegocieCoinRepository;
use App\Entities\NegocieCoin;
use App\Validators\NegocieCoinValidator;

/**
 * Class NegocieCoinRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NegocieCoinRepositoryEloquent extends BaseRepository implements NegocieCoinRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return NegocieCoin::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {

        return NegocieCoinValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
