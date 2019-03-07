<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_ID'
    ];

    protected $hidden = [
        'iban'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function paymentrequest() {
        return $this->belongsTo(PaymentRequest::class);
    }
}
