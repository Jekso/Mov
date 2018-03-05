<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use App\LoungeComment;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\StoreGroupElementCommentRequest;

class LoungeCommentController extends Controller
{
    
    public function store(StoreGroupElementCommentRequest $request, Group $group, Lounge $lounge)
    {
        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // add the comment to the lounge
        $lounge->comments()->save(new LoungeComment(['comment' => $request->comment, 'user_id' => $request->user()->id]));
        
        return $this->success_response(new DefaultSuccessResponse());
    }

    public function update(Request $request, Group $group, Lounge $lounge, LoungeComment $comment)
    {
        // authorize if comment belongs to lounge
        Authorization::authorize_lounge_element($lounge, $comment);

        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can update comment
        $this->authorize('update', $comment);

        return 'lounge comment update' ;
    }

    public function delete(Request $request, Group $group, Lounge $lounge, LoungeComment $comment)
    {
        // authorize if comment belongs to lounge
        Authorization::authorize_lounge_element($lounge, $comment);

        // authorize if the lounge belongs to the group
        Authorization::authorize_group_element($group, $lounge);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can delete comment
        $this->authorize('delete', $comment);

        $comment->delete();
        
        return $this->success_response(new DefaultSuccessResponse());
    }

}
