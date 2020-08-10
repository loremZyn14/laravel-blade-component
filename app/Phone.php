<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
