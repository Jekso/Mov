<?php

namespace App\Http\Controllers\Group\data;

use App\Data;
use App\Group;
use App\DataComment;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\StoreGroupElementCommentRequest;

class dataCommentController extends Controller
{
    
    
    public function store(StoreGroupElementCommentRequest $request, Group $group, Data $data)
    {
        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // add the comment to the data
        $data->comments()->save(new DataComment(['comment' => $request->comment, 'user_id' => $request->user()->id]));
        
        return $this->success_response(new DefaultSuccessResponse());
    }




    public function update(Request $request, Group $group, Data $data, DataComment $comment)
    {
        // authorize if comment belongs to data
        Authorization::authorize_data_element($data, $comment);

        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can update comment
        $this->authorize('update', $comment);

        return 'data comment update' ;
    }




    public function delete(Request $request, Group $group, Data $data, DataComment $comment)
    {
        // authorize if comment belongs to data
        Authorization::authorize_data_element($data, $comment);

        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // authorize if user can delete comment
        $this->authorize('delete', $comment);

        $comment->delete();
        
        return $this->success_response(new DefaultSuccessResponse());
    }

}
