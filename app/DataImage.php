<?php

namespace App;

use App\Data;
use App\DataImageContent;
use Illuminate\Database\Eloquent\Model;

class DataImage extends Model
{

    protected $fillable = ['img'];

    public function getImgAttribute($value)
    {
        return asset('files/groups/data/images/'.$value);
    }

    
    /**
    * --------- Realationship functions ---------
    */

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }

    public function image_contents()
    {
    	return $this->hasMany(DataImageContent::class);
    }
}
