<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NegocieCoinRepository.
 *
 * @package namespace App\Repositories;
 */
interface NegocieCoinRepository extends RepositoryInterface
{
public function getTickerBtcBrl();
public function getOrderBookBtcBrl();
public function getTradesBtcBrl($initial,$final);

}
