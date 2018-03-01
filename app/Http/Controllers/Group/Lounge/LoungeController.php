<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $this->authorize('view', $group);
        $lounge = $lounge->load('user', 'images', 'poll_options.users', 'comments.user', 'likes.user');
        return $this->success_response(new GroupLoungesShowResponse($lounge));
    }

    public function store(Request $request, Group $group)
    {
        $this->authorize('view', $group);
        return 'lounge store' ;
    }

    public function update(Request $request, Group $group)
    {
        return 'lounge update' ;
    }

    public function delete(Request $request, Group $group)
    {
        return 'lounge delete' ;
    }

}
