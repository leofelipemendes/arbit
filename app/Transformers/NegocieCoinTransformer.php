<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\NegocieCoin;

/**
 * Class NegocieCoinTransformer.
 *
 * @package namespace App\Transformers;
 */
class NegocieCoinTransformer extends TransformerAbstract
{
    /**
     * Transform the NegocieCoin entity.
     *
     * @param \App\Entities\NegocieCoin $model
     *
     * @return array
     */
    public function transform(NegocieCoin $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
