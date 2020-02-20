<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $guarded = [];

    public function specification() {
        return $this->belongsTo(Specification::class);
    }
}
