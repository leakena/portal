<?php

namespace App\Models\Portal\Resume;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $table = 'personal_infos';
    protected $fillable = [

        'name', 'status', 'gender', 'dob', 'birthPlace', 'email', 'phone', 'address', 'profile', 'created_at', 'updated_at'
    ];
}
