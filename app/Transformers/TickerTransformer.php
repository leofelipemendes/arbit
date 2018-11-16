<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Ticker;

/**
 * Class TickerTransformer.
 *
 * @package namespace App\Transformers;
 */
class TickerTransformer extends TransformerAbstract
{
    /**
     * Transform the Ticker entity.
     *
     * @param \App\Entities\Ticker $model
     *
     * @return array
     */
    public function transform(Ticker $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
