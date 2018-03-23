<?php

namespace App;

use App\Data;
use Illuminate\Database\Eloquent\Model;

class DataFile extends Model
{
    protected $fillable = ['file'];
    
    public function getFileAttribute($value)
    {
        return asset('files/groups/data/files/'.$value);
    }

    /**
    * --------- Realationship functions ---------
    */

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }

}
