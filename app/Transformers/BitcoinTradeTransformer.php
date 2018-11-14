<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\BitcoinTrade;

/**
 * Class BitcoinTradeTransformer.
 *
 * @package namespace App\Transformers;
 */
class BitcoinTradeTransformer extends TransformerAbstract
{
    /**
     * Transform the BitcoinTrade entity.
     *
     * @param \App\Entities\BitcoinTrade $model
     *
     * @return array
     */
    public function transform(BitcoinTrade $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
