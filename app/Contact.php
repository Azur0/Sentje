<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'user_id1',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function user1() {
        return $this->belongsTo(User::class, 'user_id1');
    }
}
