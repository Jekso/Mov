<?php

namespace App\Http\Traits;

use App\Http\Responses\IResponsible;

trait GetResponse
{
	public function success_response(IResponsible $response)
    {
    	return response()->json($response->jsonize(), 200);
    }

    public function error_response($error)
    {
    	return response()->json(['error' => $error], 403);
    }
}