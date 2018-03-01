<?php

namespace App;

use App\Group;
use App\Faculty;
use App\University;
use Illuminate\Database\Eloquent\Model;

class GroupAdditionalInfo extends Model
{
	protected $fillable = ['university', 'faculty', 'grade', 'year'];
	protected $hidden = ['id', 'group_id', 'faculty_id', 'university_id', 'created_at', 'updated_at'];
	protected $touches = ['group'];

	/**
    * --------- Realationship functions ---------
    */

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }


    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
