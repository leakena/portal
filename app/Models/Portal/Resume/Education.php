<?php

namespace App\Models\Portal\Resume;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }
}
