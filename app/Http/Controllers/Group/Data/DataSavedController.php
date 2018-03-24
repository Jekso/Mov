<?php

namespace App\Http\Controllers\Group\Data;

use App\Data;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Responses\Group\Data\GroupGetSavedDataResponse;

class DataSavedController extends Controller
{
	

    public function get_saved_data(Request $request, Group $group)
    {
        // authorize if user is joined the group
        $this->authorize('view', $group);

        // get user's saved data
        $saved_data = $group->get_saved_data($request->user());

        return $this->success_response(new GroupGetSavedDataResponse($saved_data));
    }



    public function toggle_save_data(Request $request, Group $group, Data $data)
    {
    	// authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // toggle save
        if($group->saved_data()->wherePivot('user_id', $request->user()->id)->wherePivot('data_id', $data->id)->count() > 0)
        	$group->saved_data()->detach($data->id);
        else
        	$group->saved_data()->attach($data->id, ['user_id' => $request->user()->id]);
       
       
        return $this->success_response(new DefaultSuccessResponse());
    }
}
