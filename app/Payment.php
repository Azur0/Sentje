<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    protected $fillable = [
        'user_id',
        'payment_request_ID',
        'description',
        'amount',
        'currency_ID',
        'media'
    ];

    protected $hidden = [
        'iban'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function paymentrequest() {
        return $this->belongsTo(PaymentRequest::class);
    }
}
