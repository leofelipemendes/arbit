<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


Route::prefix('ncoin')->group(function () {

    Route::get('ticker', 'NegocieCoinsController@getTickerBtcBrl');
    Route::get('orders', 'NegocieCoinsController@getOrderBookBtcBrl');
    Route::get('trades', 'NegocieCoinsController@getTradesBtcBrl');
});

Route::prefix('btctrade')->group(function () {

    Route::get('ticker', 'BitcoinTradesController@getTickerBtcBrl');
    Route::get('orders', 'BitcoinTradesController@getOrderBookBtcBrl');
    Route::get('trades', 'BitcoinTradesController@getTradesBtcBrl');
});

Route::prefix('mbtc')->group(function () {

    Route::get('ticker', 'MercadoBitcoinsController@getTickerBtcBrl');
    Route::get('orders', 'MercadoBitcoinsController@getOrderBookBtcBrl');
    Route::get('trades', 'MercadoBitcoinsController@getTradesBtcBrl');
    Route::get('daysummary', 'MercadoBitcoinsController@getDaySummary');
    
});

Route::prefix('tickers')->group(function () {

    Route::get('ticker', 'TickersController@getTicker');
    
});