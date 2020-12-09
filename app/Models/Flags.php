<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flags extends Model
{
    //

    protected $table = 'Flags';

    public $incrementing = false;

    protected $primaryKey = ['Flag_id', 'Flaged_user_id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function user(){
        return $this->belongsTo('App\Models\Flags', 'Flag_id');
    }


    public function Flaged_user(){
        return $this->belongsTo('App\Models\User', 'Flaged_user_id');
    }
}
