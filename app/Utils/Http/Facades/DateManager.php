<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 5/30/17
 * Time: 9:06 AM
 */

namespace App\Utils\Http\Facades;

use Carbon\Carbon;

class DateManager
{

    public static function dbDate($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public static function viewDate($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public static function fullDate($date)
    {
        return Carbon::parse($date)->format('M-d-Y');
    }

}