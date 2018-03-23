<?php

namespace App;

use App\Data;
use App\User;
use Illuminate\Database\Eloquent\Model;

class DataLike extends Model
{

    protected $fillable = ['user_id'];
    protected $hidden = ['data_id', 'user_id'];


    /**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }
}
