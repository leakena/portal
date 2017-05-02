<?php

namespace App\Models\Portal\Resume;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
