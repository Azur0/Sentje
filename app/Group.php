<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'owner_ID',
        'groupname'
    ];

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
