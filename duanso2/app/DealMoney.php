<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealMoney extends Model
{
    protected $table = "deal_moneys";
    protected $fillable = [
        'user_id',
        'type',
        'money',
        'description',
    ];

    public function wallets()
    {
        return $this->belongsTo('App\Wallet', 'user_id', 'id');
    }


}
