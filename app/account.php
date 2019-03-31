<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'iban'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentrequest()
    {
        return $this->hasMany(PaymentRequest::class);
    }
}
