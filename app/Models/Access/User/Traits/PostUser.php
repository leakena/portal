<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 6/2/17
 * Time: 10:12 AM
 */

namespace App\Models\Access\User\Traits;


use App\Models\Access\User\User;

trait PostUser
{
    public static function iPosted($uId)
    {
        return User::where('id', $uId)->first();

    }


}