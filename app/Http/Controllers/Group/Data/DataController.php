<?php

namespace App\Http\Controllers\Group\Data;

use App\Data;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\Data\StoreDataRequest;
use App\Http\Responses\Group\Data\GroupDataShowResponse;
use App\Http\Responses\Group\Data\GroupDataIndexResponse;
use App\Http\Responses\Group\Data\GroupDataStoreResponse;

class DataController extends Controller
{
    

    public function index(Group $group)
    {
        // authorize if user is joined the group
        $this->authorize('view', $group);

        // get the group's basic_data, add_info, Data with thier users, images, links & voice_notes
        $group_with_data = $group->load('additional_info.faculty', 'additional_info.university', 'data.user', 'data.images', 'data.links', 'data.voice_notes', 'data.files');

        return $this->success_response(new GroupDataIndexResponse($group_with_data));
    }




    public function show(Group $group, Data $data)
    {
        // authorize if the data belongs to the group
        Authorization::authorize_group_element($group, $data);

        // authorize if user is joined the group
        $this->authorize('view', $group);

        // get data with its user, images, links & voice_notes, comments & likes with thier users
        $data = $data->load('user', 'images', 'links', 'voice_notes', 'files', 'comments.user', 'likes.user');

        return $this->success_response(new GroupDataShowResponse($data));
    }




    public function store(StoreDataRequest $request, Group $group)
    {
        
        // authorize if user is joined the group
        $this->authorize('view', $group);


        // check & parse data type
        if($request->type == 'DATA_WITH_LINK')
            $request->type = Data::DATA_WITH_LINK;
        else if($request->type == 'DATA_WITH_IMG')
            $request->type = Data::DATA_WITH_IMG;
        elseif($request->type == 'DATA_WITH_VOICE')
            $request->type = Data::DATA_WITH_VOICE;
        elseif($request->type == 'DATA_WITH_FILE')
            $request->type = Data::DATA_WITH_FILE;


        // save basic Data data
        $data = new Data;
        $data->save_basic_data($request);
        $group->data()->save($data);


        // save Data linkes if found
        if($request->type == Data::DATA_WITH_LINK && !empty($request->links))
            $data->save_data_links($request->links);


        // save Data images if found
        if($request->type == Data::DATA_WITH_IMG && !empty($request->images))
            $data->save_data_images($request->images);


        // save Data voice_notes if found
        if($request->type == Data::DATA_WITH_VOICE && !empty($request->voice_notes))
            $data->save_data_voice_notes($request->voice_notes);


        // save Data files if found
        if($request->type == Data::DATA_WITH_FILE && !empty($request->files))
            $data->save_data_files($request->data_files);


        $data = $data->load('user', 'images', 'links', 'voice_notes', 'files');

        return $this->success_response(new GroupDataStoreResponse($data));
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
