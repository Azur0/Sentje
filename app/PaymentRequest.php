<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $fillable = [
        'created_by_user_ID',
        'to_user_ID',
        'deposit_account_ID',
        'currency_ID',
        'requested_amount',
        'status',
        'payment_url',
        'description',
        'request_type'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
