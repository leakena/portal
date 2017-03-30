<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 3/29/17
 * Time: 4:16 PM
 */

namespace App\Utils\Http\ApiRequest;

use GuzzleHttp\Client;
use App\Utils\Http\ApiUrl\IUrlManager;


class Manager implements IManager
{


    protected $urlManager;
    public function __construct(IUrlManager $apiUrlManager) {
        $this->urlManager = $apiUrlManager;
    }

    public function getApiRequestResult($url, $methodType, array $params = array(), array $elements = array(), array $attributes = array(), $where) {

        $client = $this->getClientRequest();
        $res = $client->request(strtoupper($methodType), $this->urlManager->getCompleteUrl($url, $elements, $attributes, $where), ['form_params' => $params]);

        /*$res = (string)$res->getBody();
        return json_decode(utf8_encode($res));*/

        $res =  $res->getBody()->getContents();
        return json_decode($res, true);
    }

//    public function getApiRequest
    public function getApiBaseUrl() {
        return $this->urlManager->getApiBaseUrl();
    }

    private function getClientRequest() {
        return new Client(['cookies' => true]);
    }

}