<?php

namespace App;

use App\Data;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DataComment extends Model
{

    protected $fillable = ['user_id', 'comment'];
    protected $hidden = ['data_id', 'user_id'];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    
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
