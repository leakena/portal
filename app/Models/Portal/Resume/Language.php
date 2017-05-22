<?php

namespace App\Models\Portal\Resume;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */



    public function resumes()
    {
        return $this->belongsToMany(Resume::class, 'language_resume', 'language_id', 'resume_uid');
    }
}
