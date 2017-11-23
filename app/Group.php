<?php

namespace App;


use App\Data;
use App\User;
use App\Lounge;
use App\Question;
use App\Assignment;
use App\InterestTag;
use App\GroupAdditionalInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $hidden = ['pivot'];
    public function getRouteKeyName()
    {
        return 'group_code';
    }

    // group type Constants
	const GENERAL_GROUP  = 0;
	const SPECIFIC_GROUP = 1;


    // group is_private Constants
    const PUBLIC_GROUP  = 0;
    const PRIVATE_GROUP = 1;


    /**
    * --------- Helpers functions ---------
    */

    public static function discover_groups()
    {
        $groups = [];

        // get not joined nor private groups 
        $joined_groups_ids = Auth::user()->groups->pluck('id');
        $not_joined_nor_private_groups = Group::whereNotIn('id', $joined_groups_ids)->where('is_private', 0);

        $groups['most_populer'] = self::get_most_populer_groups($not_joined_nor_private_groups);
        $groups['may_like'] = self::get_may_like_groups($not_joined_nor_private_groups);
        return $groups;
    }


    private static function get_most_populer_groups($groups)
    {
        $most_populer_groups = $groups->withCount('users')->orderBy('users_count', 'desc')->take(5)->get();
        return $most_populer_groups;
    }

    private static function get_may_like_groups($groups)
    {
        $group_with_user_tags_ids = Auth::user()->load('interest_tags.groups')
                                    ->interest_tags->pluck('groups')
                                    ->flatten()->unique('group_code')
                                    ->pluck('id');
        return $groups->whereIn('id', $group_with_user_tags_ids)->withCount('users')->get();
    }


    /**
    * --------- Realationship functions ---------
    */

    public function additional_info()
    {
    	return $this->hasOne(GroupAdditionalInfo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function interest_tags()
    {
    	return $this->belongsToMany(InterestTag::class);
    }

    public function lounges()
    {
    	return $this->hasMany(Lounge::class);
    }

    public function data()
    {
    	return $this->hasMany(Data::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

    public function assignments()
    {
    	return $this->hasMany(Assignment::class);
    }
}
