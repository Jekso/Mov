<?php

namespace App\Http\Controllers;

use App\Http\Responses\IResponsible;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success_response(IResponsible $response)
    {
    	return response()->json($response->jsonize(), 200);
    }

    public function error_response(IResponsible $response, $error_code = 422)
    {
    	return response()->json(['errors' => $response->jsonize()], $error_code);
    }

}
