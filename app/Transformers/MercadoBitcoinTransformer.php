<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\MercadoBitcoin;

/**
 * Class MercadoBitcoinTransformer.
 *
 * @package namespace App\Transformers;
 */
class MercadoBitcoinTransformer extends TransformerAbstract
{
    /**
     * Transform the MercadoBitcoin entity.
     *
     * @param \App\Entities\MercadoBitcoin $model
     *
     * @return array
     */
    public function transform(MercadoBitcoin $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
