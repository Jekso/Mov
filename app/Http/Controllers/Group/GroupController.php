<?php

namespace App\Http\Controllers\Group;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\Errors\Errors;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\DeleteGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Responses\Group\UserDiscoverGroupsResponse;

class GroupController extends Controller
{

    public function index(Request $request)
    {
        return $this->success_response(new UserJoinedGroupsResponse($request->user()->groups));
    }


    public function discover(Request $request)
    {
        $groups = Group::discover_groups();
        $most_populer_groups = $groups['most_populer'];
        $may_like_groups = $groups['may_like'];
        return $this->success_response(new UserDiscoverGroupsResponse($most_populer_groups, $may_like_groups));
    }


    public function join(Request $request, Group $group)
    {
        // check if user is already joined the group
        if($request->user()->is_joined($group))
            return $this->error_response(Errors::USER_ALREADY_JOINED);

        // join user to the group
        $request->user()->groups()->attach($group->id);
        return $this->success_response(new DefaultSuccessResponse());
    }



    public function store(StoreGroupRequest $request)
    {
        return 'store' ;
    }

    public function update(UpdateGroupRequest $request)
    {
        return 'update' ;
    }

    public function delete(DeleteGroupRequest $request)
    {
        return 'delete' ;
    }

}
