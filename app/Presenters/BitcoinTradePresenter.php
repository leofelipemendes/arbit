<?php

namespace App\Presenters;

use App\Transformers\BitcoinTradeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BitcoinTradePresenter.
 *
 * @package namespace App\Presenters;
 */
class BitcoinTradePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BitcoinTradeTransformer();
    }
}
