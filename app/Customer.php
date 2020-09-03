<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ["address"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
