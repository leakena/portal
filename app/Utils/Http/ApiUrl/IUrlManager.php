<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 3/29/17
 * Time: 4:44 PM
 */

namespace App\Utils\Http\ApiUrl;

interface IUrlManager {

    function setBaseApiUrl($baseUrl);
    function getCompleteUrl($endUrl, array $elements = array(), array $attributes = array(), $where);
    function getApiBaseUrl();
}