<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 3/29/17
 * Time: 4:19 PM
 */

namespace App\Utils\Http\Facades;
use App\Utils\Http\ApiRequest\IManager;
use GuzzleHttp\Client;
use SimpleXMLElement;

class ApiRequestManager
{

    protected $apiManager;
    public function __construct(IManager $iManagerRequest)
    {
        $this->apiManager = $iManagerRequest;

    }

    public function getElementsFromApi($endUrl, array $elements = array(), array $attributes = array(), array $where = array()) {
        $result = $this->getApiResult($endUrl, $elements, $attributes, $where);
        /*return $result ? is_array($result) ? $result : [$result] : [];*/
        return $result;
    }

    private function getApiResult($endUrl, array $elements, array $attributes, array $where = array()) {
        return $this->apiManager->getApiRequestResult($endUrl, 'GET', [], $elements, $attributes, $where);
    }

    public function getDataFromApi() {

        $client = new Client(['cookies' => true]);
        $res = $client->request('GET','http://192.168.105.106:8000/api/student/score?student_annual_id=20486');
        /*echo $res->getStatusCode(); // 200*/
        $res =  $res->getBody()->getContents();

        return json_decode($res, true);
    }

}