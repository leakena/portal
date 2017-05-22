<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 5/20/17
 * Time: 9:51 PM
 */

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;


use Illuminate\Http\Request;

trait ResumeTrait
{

    public function getExperience( Request $request)
    {
        return view('frontend.new_portals.resumes.experience.experience');
    }


    public function getSkill( Request $request)
    {

        return view('frontend.new_portals.resumes.skill.skill');

    }

}