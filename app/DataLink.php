<?php

namespace App;

use App\Data;
use Illuminate\Database\Eloquent\Model;

class DataLink extends Model
{
    protected $fillable = ['link'];

    /**
    * --------- Realationship functions ---------
    */

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }
}
