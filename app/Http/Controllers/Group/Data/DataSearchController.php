<?php

namespace App\Http\Controllers\Group\Data;

use App\Data;
use App\Group;
use App\DataImageContent;
use App\DataVoiceContent;
use Illuminate\Http\Request;
use App\Http\Helpers\Authorization;
use App\Http\Controllers\Controller;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Group\Data\NormalSearchDataRequest;
use App\Http\Requests\Group\Data\SearchInDepthDataRequest;
use App\Http\Responses\Group\Data\GroupNormalSearchDataResponse;
use App\Http\Responses\Group\Data\GroupSearchInDepthDataResponse;

class DataSearchController extends Controller
{
    
    public function normal_search(NormalSearchDataRequest $request, Group $group)
    {
        // authorize if user is joined the group
        $this->authorize('view', $group);


        // create searchable query
        $query = $group->data()->where('caption', 'LIKE', '%' . $request->input('query') . '%');


        // check filters
        if(!empty($request->input('filters.type')))
        {
            // check & parse data type
            if($request->input('filters.type') == 'DATA_WITH_LINK')
                $type = Data::DATA_WITH_LINK;
            else if($request->input('filters.type') == 'DATA_WITH_IMG')
                $type = Data::DATA_WITH_IMG;
            elseif($request->input('filters.type') == 'DATA_WITH_VOICE')
                $type = Data::DATA_WITH_VOICE;
            elseif($request->input('filters.type') == 'DATA_WITH_FILE')
                $type = Data::DATA_WITH_FILE;


            $query = $query->where('type', $type);
        }


        // get searchable data
        $data = $query->with('user', 'images', 'links', 'voice_notes', 'files')->get();

        return $this->success_response(new GroupNormalSearchDataResponse($data));
    }


    public function search_in_depth(SearchInDepthDataRequest $request, Group $group)
    {

        // authorize if user is joined the group
        $this->authorize('view', $group);


        // check filters
        $images = [];
        $voices = [];
        if($request->input('filters.type') == 'DATA_WITH_IMG')
            // search & return images with contents
            $images = DataImageContent::where('group_id', $group->id)->where('keyword', strtolower($request->input('query')))->with('image')->get();
        else if($request->input('filters.type') == 'DATA_WITH_VOICE')
            // search & return voice_notes with contents
            $voices = DataVoiceContent::where('group_id', $group->id)->where('keyword', strtolower($request->input('query')))->with('voice')->get();

        return $this->success_response(new GroupSearchInDepthDataResponse(strtolower($request->input('query')), $images, $voices));
    }
}
