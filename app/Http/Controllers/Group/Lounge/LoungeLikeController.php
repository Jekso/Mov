<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use App\LoungeLike;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;

class LoungeLikeController extends Controller
{
    
    public function toggle_like(Request $request, Group $group, Lounge $lounge)
    {
      
        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);


        // toggle like
        if($lounge->likes()->where('user_id', $request->user()->id)->count() > 0)
        	$lounge->likes()->where('user_id', $request->user()->id)->delete();
        else
        	$lounge->likes()->save(new LoungeLike(['user_id' => $request->user()->id]));


        return $this->success_response(new DefaultSuccessResponse());
    }

}
