<?php
namespace App\Utils\Http\ApiRequest;
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 3/29/17
 * Time: 4:14 PM
 */


interface IManager {
    public function getApiRequestResult($url, $methodType, array $params = array(), array $elements = array(), array $attributes = array(), $where);
    public function getApiResultByIds($url, array $ids = array());
    public function getApiBaseUrl();
}