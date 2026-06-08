<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $guarded = [];

    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }
}
