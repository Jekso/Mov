<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\Lounge\StoreLoungeRequest;
use App\Http\Responses\Group\Lounge\GroupLoungesShowResponse;
use App\Http\Responses\Group\Lounge\GroupLoungesIndexResponse;
use App\Http\Responses\Group\Lounge\GroupLoungesStoreResponse;

class LoungeController extends Controller
{


    
    public function index(Group $group)
    {
        // authorize if user is joined the group
        $this->authorize('view', $group);

        // get the group's basic_data, add_info, lounges with thier users & images and poll_options with their users
        $group_with_lounges = $group->load('additional_info.faculty', 'additional_info.university', 'lounges.user', 'lounges.images', 'lounges.poll_options.users');

        return $this->success_response(new GroupLoungesIndexResponse($group_with_lounges));
    }




    public function show(Group $group, Lounge $lounge)
    {
        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // get lounge with its user, images, polls with thire users, comments & likes with their users
        $lounge = $lounge->load('user', 'images', 'poll_options.users', 'comments.user', 'likes.user');

        return $this->success_response(new GroupLoungesShowResponse($lounge));
    }




    public function store(StoreLoungeRequest $request, Group $group)
    {

        // authorize if user is joined the group
        $this->authorize('view', $group);


        // check & parse lounge type
        if($request->type == 'NO_IMG_NO_POLL')
            $request->type = Lounge::NO_IMG_NO_POLL;
        else if($request->type == 'LOUNGE_WITH_POLL')
            $request->type = Lounge::LOUNGE_WITH_POLL;
        elseif($request->type == 'LOUNGE_WITH_IMG')
            $request->type = Lounge::LOUNGE_WITH_IMG;


        // save basic lounge data
        $lounge = new Lounge;
        $lounge->save_basic_data($request);
        $group->lounges()->save($lounge);


        // save lounge images if found
        if($request->type == Lounge::LOUNGE_WITH_IMG && !empty($request->images))
            $lounge->save_lounge_images($request->images);


        // save lounge poll_options if found
        if($request->type == Lounge::LOUNGE_WITH_POLL && !empty($request->poll_options))
            $lounge->save_lounge_poll_options($request->poll_options);


        $lounge = $lounge->load('user', 'images', 'poll_options.users');

        return $this->success_response(new GroupLoungesStoreResponse($lounge));
    }




    public function update(Request $request, Group $group, Lounge $lounge)
    {
        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can update the lounge
        $this->authorize('update', $lounge);

        return 'lounge update' ;
    }




    public function delete(Request $request, Group $group, Lounge $lounge)
    {
        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can delete the lounge
        $this->authorize('delete', $lounge);

        $lounge->delete();
        
        return $this->success_response(new DefaultSuccessResponse());
    }

}
