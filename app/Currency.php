<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function payment() {
        return $this->hasMany(Payment::class);
    }

    public function payment_request() {
        return $this->hasMany(PaymentRequest::class);
    }
}
