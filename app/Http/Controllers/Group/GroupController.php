<?php

namespace App\Http\Controllers\Group;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Group\JoinGroupRequest;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\DeleteGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Responses\Group\UserJoinedGroupsResponse;
use App\Http\Responses\Group\UserDiscoverGroupsResponse;

class GroupController extends Controller
{

    public function index(Request $request)
    {
        return $this->success_response(new UserJoinedGroupsResponse($request->user()->groups));
    }


    public function discover(Request $request)
    {
        $most_populer_groups    = Group::withCount('users')->orderBy('users_count', 'desc')->get();
        $may_like_groups        = $request->user()->load('interest_tags.groups.users')
                                ->interest_tags->pluck('groups')->flatten()
                                ->unique('group_code');
        return $this->success_response(new UserDiscoverGroupsResponse($most_populer_groups, $may_like_groups));
    }


    public function join(JoinGroupRequest $request)
    {
        return 'join' ;
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
