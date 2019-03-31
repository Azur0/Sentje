<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupHasUser extends Model
{
    protected $fillable = [
        'group_id',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function group()
    {
        return $this->has(User::class);
    }
}
