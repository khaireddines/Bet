<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyBet extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'MyBets';
    protected $fillable = [
        'user_id',
        'object_id',
        'bet_prise'
    ];
    public function vehicule()
    {
        return $this->hasMany('App\vehicule','id','object_id');
    }
}
