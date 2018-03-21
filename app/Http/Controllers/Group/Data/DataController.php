<?php

namespace App\Http\Controllers\Group\Data;

use App\Data;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Responses\Group\Data\GroupDataShowResponse;
use App\Http\Responses\Group\Data\GroupDataIndexResponse;

class DataController extends Controller
{
    

    public function index(Group $group)
    {
        // authorize if user is joined the group
        $this->authorize('view', $group);

        // get the group's basic_data, add_info, Data with thier users, images, links & voice_notes
        $group_with_data = $group->load('additional_info.faculty', 'additional_info.university', 'data.user', 'data.images', 'data.links', 'data.voice_notes');

        return $this->success_response(new GroupDataIndexResponse($group_with_data));
    }




    public function show(Group $group, Data $data)
    {
        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // get data with its user, images, links & voice_notes, comments & likes with thier users
        $data = $data->load('user', 'images', 'links', 'voice_notes', 'comments.user', 'likes.user');

        return $this->success_response(new GroupDataShowResponse($data));
    }




    public function store( )
    {
        return 'data store' ;
    }




    public function update(Request $request, Group $group, Data $data)
    {
        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can update the data
        $this->authorize('update', $data);

        return 'data update' ;
    }




    public function delete(Request $request, Group $group, Data $data)
    {
        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can delete the data
        $this->authorize('delete', $data);

        $data->delete();
        
        return $this->success_response(new DefaultSuccessResponse());
    }

}
