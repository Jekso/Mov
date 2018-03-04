<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\Lounge\StoreLoungeRequest;
use App\Http\Responses\Group\Lounge\GroupLoungesShowResponse;
use App\Http\Responses\Group\Lounge\GroupLoungesIndexResponse;

class LoungeController extends Controller
{


    
    public function index(Group $group)
    {
        $this->authorize('view', $group);
        $group_with_lounges = $group->load('additional_info.faculty', 'additional_info.university', 'lounges.user', 'lounges.images', 'lounges.poll_options.users');
        return $this->success_response(new GroupLoungesIndexResponse($group_with_lounges));
    }




    public function show(Group $group, Lounge $lounge)
    {
        // TODO: authorize lounge belongs to group that user can join
        $this->authorize('view', $group);
        $lounge = $lounge->load('user', 'images', 'poll_options.users', 'comments.user', 'likes.user');
        return $this->success_response(new GroupLoungesShowResponse($lounge));
    }




    public function store(StoreLoungeRequest $request, Group $group)
    {

        // authorize is user joined group or not
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


        return $this->success_response(new DefaultSuccessResponse());
    }




    public function update(Request $request, Group $group, Lounge $lounge)
    {
        $this->authorize('view', $group);
        $this->authorize('update', $lounge);
        return 'lounge update' ;
    }




    public function delete(Request $request, Group $group, Lounge $lounge)
    {
        $this->authorize('view', $group);
        $this->authorize('delete', $lounge);
        $lounge->delete();
        return $this->success_response(new DefaultSuccessResponse());
    }

}
