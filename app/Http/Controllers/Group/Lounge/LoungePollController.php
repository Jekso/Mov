<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use App\LoungePollOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;

class LoungePollController extends Controller
{
    
    public function choose_option(Request $request, Group $group, Lounge $lounge, LoungePollOption $option)
    {
    	// TODO: authorize option belongs to lounge that belongs to group user joined
        $option->users()->toggle($request->user());
        return $this->success_response(new DefaultSuccessResponse());
    }
}
