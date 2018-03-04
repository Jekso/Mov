<?php

namespace App\Http\Controllers\Group\Lounge;

use App\Group;
use App\Lounge;
use App\LoungeComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\StoreGroupElementCommentRequest;

class LoungeCommentController extends Controller
{
    
    public function store(StoreGroupElementCommentRequest $request, Group $group, Lounge $lounge)
    {
        // TODO: authorize lounge belongs to group that user can join
        $lounge->comments()->save(new LoungeComment(['comment' => $request->comment, 'user_id' => $request->user()->id]));
        return $this->success_response(new DefaultSuccessResponse());
    }

    public function update(Request $request, Group $group, Lounge $lounge, LoungeComment $comment)
    {
        // TODO: authorize user is joined group and can update comment
        return 'lounge comment update' ;
    }

    public function delete(Request $request, Group $group, Lounge $lounge, LoungeComment $comment)
    {
        // TODO: authorize user is joined group and can delete comment
        $comment->delete();
        return $this->success_response(new DefaultSuccessResponse());
    }

}
