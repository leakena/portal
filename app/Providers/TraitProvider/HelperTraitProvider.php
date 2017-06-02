<?php

/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 6/1/17
 * Time: 5:38 PM
 */
namespace App\Providers\TraitProvider;
use Illuminate\Support\Facades\DB;

trait HelperTraitProvider
{

    public function tags()
    {
        $tags = DB::table('tags')->get();
        return $tags;
    }


    public function categories()
    {
        $categories = DB::table('categories')->get();
        return $categories;
    }


}