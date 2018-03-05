<?php

namespace App\Http\Controllers\Group;

use App\User;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\Errors\Errors;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Responses\Group\StoreGroupResponse;
use App\Http\Responses\Group\UpdateGroupResponse;
use App\Http\Responses\Group\UserJoinedGroupsResponse;
use App\Http\Responses\Group\UserDiscoverGroupsResponse;

class GroupController extends Controller
{


    public function index(Request $request)
    {
        // get all user's joined groups
        $groups = $request->user()->groups()->withCount('users')->orderBy('updated_at', 'DESC')->get();

        return $this->success_response(new UserJoinedGroupsResponse($groups));
    }



    public function discover(Request $request)
    {
        // get Most Populer & May Like Groups
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



    public function leave(Request $request, Group $group)
    {
        // check if user not joined the group
        if(!$request->user()->is_joined($group))
            return $this->error_response(Errors::USER_NOT_JOINED);

        // remove user from the group
        $request->user()->groups()->detach($group->id);

        return $this->success_response(new DefaultSuccessResponse());
    }



    public function store(StoreGroupRequest $request)
    {
        // save group's basic data
        $group = new Group;
        $group->save_basic_data($request);

        // save additional info if group_type == specific
        if($request->type == 'Specific')
            $group->save_additional_info($request);

        // save group's tags
        $group->interest_tags()->attach($request->tags);

        // join the user to the group as a creator
        $request->user()->groups()->attach($group->id, ['role' => User::GROUP_CREATOR]);

        return $this->success_response(new StoreGroupResponse($group));
    }



    public function update(UpdateGroupRequest $request, Group $group)
    {
        // authorize user to update the group
        $this->authorize('update', $group);

        // update group's basic data
        $group->update_basic_data($request);

        // update additional info if group_type == specific
        if($request->type == 'Specific')
            $group->update_additional_info($request);

        // update group's tags
        $group->interest_tags()->sync($request->tags);

        return $this->success_response(new UpdateGroupResponse($group));
    }



    public function delete(Request $request, Group $group)
    {
        // authorize user to delete the group
        $this->authorize('delete', $group);

        $group->delete();

        return $this->success_response(new DefaultSuccessResponse());
    }

}
