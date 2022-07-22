<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $fillable = [
        'campaign_id','payer_name','payer_email','payer_phone','transaction_id','currency_code','amount','payment_status',
    ];
}
