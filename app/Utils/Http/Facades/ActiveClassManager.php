<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 4/7/17
 * Time: 8:31 AM
 */

namespace App\Utils\Http\Facades;
use Illuminate\Support\Facades\Route;


class ActiveClassManager
{

    private $active;
    public function __construct()
    {
        $this->active = 'active';

    }

    public static function isActiveRoute($route) { //compare route name
        return (Route::currentRouteName() == $route)?'active':'';
    }

    public static function areActiveRoutes(Array $routes)
    {
        foreach ($routes as $route)
        {
            if (Route::currentRouteName() == $route) return 'active';
        }

    }

    public static function pattern($parttern) {

        return (str_is($parttern.'*', Route::currentRouteName()))?'active':'';
    }

    public static function patterns(Array $patterns) {

        $count = 0;
        foreach ($patterns as $parttern)
        {
            if(str_is($parttern.'*', Route::currentRouteName())) {
                $count++;
            }
        }

        if($count > 0) {
            return 'active';
        } else {
            return '';
        }
    }

    public static function iscollapsed(array $patterns) {

        $count = 0;
        foreach ($patterns as $parttern)
        {
            if(str_is($parttern.'*', Route::currentRouteName())) {
                $count++;
            }
        }

        if($count > 0) {
            return ['class' => 'accordion-toggle', 'status' => 'true', 'in'=>'in', 'style' => ''];
        } else {
            return ['class' => 'accordion-toggle collapsed', 'status' => 'false', 'in' => '', 'style' => 'style="height:0px"'];
        }

    }

}