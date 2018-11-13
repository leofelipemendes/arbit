<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NegocieCoinRepository;
use App\Entities\NegocieCoin;
use App\Validators\NegocieCoinValidator;

/**
 * Class NegocieCoinRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NegocieCoinRepositoryEloquent extends BaseRepository implements NegocieCoinRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NegocieCoin::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return NegocieCoinValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getOrderBookBtcBrl() {
        
    }

    public function getTickerBtcBrl() {
        $url = 'https://broker.negociecoins.com.br/api/v3/btcbrl/ticker';
        $response = $this->getCurlApi($url);
        return $response;
        
    }

    public function getTradesBtcBrl($initial, $fina) {
        
    }
    
    public function getCurlApi($url) {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            // Set Here Your Requesred Headers
            'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //transforma em array associativo
            return $response;
        }
    
    }

}
