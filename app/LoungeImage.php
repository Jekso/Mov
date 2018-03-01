<?php

namespace App;

use App\Lounge;
use Illuminate\Database\Eloquent\Model;

class LoungeImage extends Model
{


	public function getImgAttribute($value)
    {
        return asset('files/groups/lounges/images/'.$value);
    }

    public function get_img_name()
    {
        return substr($this->img, strpos($this->img, "/files/groups/lounges/images/")+29);
    }
    
    
    /**
    * --------- Realationship functions ---------
    */

    public function lounge()
    {
    	return $this->belongsTo(Lounge::class);
    }
}
