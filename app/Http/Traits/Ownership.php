<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait Ownership
{
	
	/**
	*	Groups Ownership
	*/

	public function is_joined($group)
    {       
        return ($this->groups()->where('group_id', $group->id)->count() > 0);
    }


    public function is_creator($group)
    {
        $group = $this->groups()->where('group_id', $group->id)->first();
        if($group)
            return ($group->pivot->role === self::GROUP_CREATOR);
        return false;
    }


    public function is_owner($model)
    {
    	return ($this->id == $model->user_id);
    }

}
