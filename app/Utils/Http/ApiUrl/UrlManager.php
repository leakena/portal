<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 3/29/17
 * Time: 4:47 PM
 */

namespace App\Utils\Http\ApiUrl;

use Illuminate\Support\Facades\Auth;


class UrlManager implements IUrlManager
{

    private $endApiUrl;
    private $targetServerUrl;

    public function __construct() {
        $this->endApiUrl = str_replace(url('/'), '', url('api'));
        $this->targetServerUrl = 'http://192.168.51.89';//'http://192.168.105.106:8000';

    }

    public function  setBaseApiUrl($baseUrl) {

    }

    public function getCompleteUrl($endUrl, array $elements = array(), array $attributes = array(), $where) {

        $endUrl = $this->constructApiUrlWithParams($endUrl, $elements, $attributes, $where);
        return $this->getApiBaseUrl() . $endUrl;
    }

    private function constructApiUrlWithParams($endUrl, array $elements = array(), array $attributes = array(), array $where = array()) {

        $endUrl = $endUrl . '?params=';
        $endUrl .= $this->getParamsToAttachToUrl($elements);

        $endUrl .= '&attributes=';
        $endUrl .= $this->getParamsToAttachToUrl($attributes);

        $endUrl .= '&where=';
        $endUrl .= $this->getParamsToAttachToUrl($where, '_');

        $endUrl .= '&token=';
        $endUrl .= Auth::user() ? Auth::user()->remember_token : '';

        return $endUrl;
    }


    private function getParamsToAttachToUrl(array $elements, $replaceSpace = '', $separator = '+') {

        $paramsToAttach = '';

        foreach($elements as $i => $element) {
            $paramsToAttach .= str_replace(' ', $replaceSpace, $element);

            if($i + 1 < count($elements))
                $paramsToAttach .= $separator;
        }

        return $paramsToAttach;
    }
    public function getApiBaseUrl() {
        return  $this->targetServerUrl;
    }



}