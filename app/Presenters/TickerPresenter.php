<?php

namespace App\Presenters;

use App\Transformers\TickerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TickerPresenter.
 *
 * @package namespace App\Presenters;
 */
class TickerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TickerTransformer();
    }
}
