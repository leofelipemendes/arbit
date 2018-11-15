<?php

namespace App\Presenters;

use App\Transformers\MercadoBitcoinTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MercadoBitcoinPresenter.
 *
 * @package namespace App\Presenters;
 */
class MercadoBitcoinPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MercadoBitcoinTransformer();
    }
}
