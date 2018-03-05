<?php

namespace App;


use App\Data;
use App\User;
use App\Lounge;
use App\Question;
use Carbon\Carbon;
use App\Assignment;
use App\InterestTag;
use App\GroupAdditionalInfo;
use App\Http\Traits\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use Helpers;

    protected $hidden = ['pivot'];
    public function getRouteKeyName()
    {
        return 'group_code';
    }

    // default img
    const DEFAULT_IMG = 'default.png';

    // group type Constants
	const GENERAL_GROUP  = 0;
	const SPECIFIC_GROUP = 1;


    // group is_private Constants
    const PUBLIC_GROUP  = 0;
    const PRIVATE_GROUP = 1;

    public function getImgAttribute($value)
    {
        return asset('files/groups/images/'.$value);
    }

    public function get_img_name()
    {
        return substr($this->img, strpos($this->img, "/files/groups/images/")+21);
    }

    public function getTypeAttribute($value)
    {
        return ($value == 0) ? 'General' : 'Specific';
    }


    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }




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


    public function save_basic_data($request)
    {
        $this->name = $request->name;
        $this->desc = $request->desc;
        $this->is_private = $request->is_private;
        $this->group_code = ($request->is_private) ? $request->group_code : str_random(10);
        $this->type = ($request->type == 'Specific') ? self::SPECIFIC_GROUP : self::GENERAL_GROUP;
        $this->img = ($request->has('img')) ? $this->generate_and_store_img($request->img, 'groups_images') : self::DEFAULT_IMG;
        $this->save();
    }

    public function update_basic_data($request)
    {
        $this->name = $request->name;
        $this->desc = $request->desc;
        $this->is_private = $request->is_private;
        $this->type = ($request->type == 'Specific') ? self::SPECIFIC_GROUP : self::GENERAL_GROUP;
        $this->img = ($request->has('img')) ? $this->generate_and_store_img($request->img, 'groups_images') : $this->get_img_name();
        $this->save();
    }


    public function save_additional_info($request)  
    {
        $this->additional_info()->create([
            'university_id'    => $request->input('additional_info.university'),
            'faculty_id'       => $request->input('additional_info.faculty'),
            'grade'         => $request->input('additional_info.grade'),
            'year'          => $request->input('additional_info.year')
        ]);
    }

    public function update_additional_info($request)  
    {
        $this->additional_info()->update([
            'university_id'    => $request->input('additional_info.university'),
            'faculty_id'       => $request->input('additional_info.faculty'),
            'grade'         => $request->input('additional_info.grade'),
            'year'          => $request->input('additional_info.year')
        ]);
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
        return $this->belongsToMany(User::class)->withPivot('role', 'is_banned');
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
