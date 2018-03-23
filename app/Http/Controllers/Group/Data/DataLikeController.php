<?php

namespace App\Http\Controllers\Group\Data;

use App\Data;
use App\Group;
use App\DataLike;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;

class DataLikeController extends Controller
{
    
    public function toggle_like(Request $request, Group $group, Data $data)
    {
      
        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);


        // toggle like
        if($data->likes()->where('user_id', $request->user()->id)->count() > 0)
        	$data->likes()->where('user_id', $request->user()->id)->delete();
        else
        	$data->likes()->save(new DataLike(['user_id' => $request->user()->id]));


        return $this->success_response(new DefaultSuccessResponse());
    }
}
