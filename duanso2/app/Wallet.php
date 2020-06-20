<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'tongtien'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function dealMoneys()
    {
        return $this->hasMany('App\DealMoney', 'user_id', 'id');
    }
}
