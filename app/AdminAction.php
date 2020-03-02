<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminAction extends Model
{
    protected $guarded = [];

    public function admin() {
        return $this->belongsTo(User::class);
    }

    public function specifications() {
        return $this->hasMany(Specification::class);
    }
}
