<?php

namespace App\Http\Controllers\Frontend\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\Http\Facades\ApiRequestManager;

class ApiController extends Controller
{

    protected $apiRequestManager;

    public function __construct(ApiRequestManager $apiRequestManager) {
        $this->apiRequestManager = $apiRequestManager;
    }


    public function get_data_array($endUrl, array $ids = array() ){

        return $this->apiRequestManager->getDataByArrayIds($endUrl, $ids);
    }
}
