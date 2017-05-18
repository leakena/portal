<?php

namespace App\Models\Portal\Resume;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    public function personalInfo(){
        return $this->hasOne(PersonalInfo::class);
    }
}
