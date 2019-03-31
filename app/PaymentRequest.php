<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $fillable = [
        'created_by_user_id',
        'to_user_id',
        'deposit_account_id',
        'currencies_id',
        'requested_amount',
        'description',
        'request_type',
        'payment_url',
        'success_url',
        'media'
    ];

    public function created_by_user() {
        return $this->belongsTo(User::class);
    }

    public function to_user(){
    	return $this->belongsTo(User::class, 'id');
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class, 'currencies_id');
    }
}
