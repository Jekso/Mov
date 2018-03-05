<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use App\LoungePollOption;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;

class LoungePollController extends Controller
{
    
    public function choose_option(Request $request, Group $group, Lounge $lounge, LoungePollOption $option)
    {
        
    	// authorize if option belongs to lounge
        Authorization::authorize_lounge_element($lounge, $option);

        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        $option->users()->toggle($request->user());
        
        return $this->success_response(new DefaultSuccessResponse());
    }
}
