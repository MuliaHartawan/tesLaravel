<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataaset extends Model
{
    protected $guarded = [];
    
    //relasi buat user di DataasetResource
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
