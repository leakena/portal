<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Utils\Http\Facades\ApiRequestManager;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $apiRequestManager;

    public function __construct(ApiRequestManager $apiRequestManager) {
        $this->apiRequestManager = $apiRequestManager;
    }

    public function getElementByApi($endUrl, $elements , $attributes , $where) {

        return $this->apiRequestManager->getElementsFromApi($endUrl, $elements , $attributes , $where);


    }


}
