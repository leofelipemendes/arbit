<?php

namespace App\Presenters;

use App\Transformers\NegocieCoinTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NegocieCoinPresenter.
 *
 * @package namespace App\Presenters;
 */
class NegocieCoinPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NegocieCoinTransformer();
    }
}
