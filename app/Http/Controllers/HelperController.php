<?php

namespace App\Http\Controllers;

use App\InterestTag;
use Illuminate\Http\Request;
use App\Http\Responses\Helpers\InterestTagsResponse;

class HelperController extends Controller
{
    
    public function get_tags()
    {
        $tags = InterestTag::all();
        return $this->success_response(new InterestTagsResponse($tags));
    }
}
