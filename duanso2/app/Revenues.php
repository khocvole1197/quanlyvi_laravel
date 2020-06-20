<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenues extends Model
{
    //
    protected $fillable = [
        'user_id',
        'type',
        'money',
        'description',
    ];
    protected $table = "revenues";
    public function addData($thu,$description){
        Revenues::create([
            'thu' => $thu,
            'description' => $description,
        ]);
    }
}
