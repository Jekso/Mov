<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\University;
use App\InterestTag;
use Illuminate\Http\Request;
use App\Http\Responses\Helpers\UniFacResponse;
use App\Http\Responses\Helpers\InterestTagsResponse;

class HelperController extends Controller
{
    
    public function get_tags()
    {
        $tags = InterestTag::all();
        return $this->success_response(new InterestTagsResponse($tags));
    }


    public function get_uni_fac()
    {
    	$universities = University::all();
    	$faculties = Faculty::all();
    	return $this->success_response(new UniFacResponse($universities, $faculties));
    }
}
