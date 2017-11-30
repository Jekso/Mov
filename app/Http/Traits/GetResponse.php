<?php

namespace App\Http\Traits;

use App\Http\Responses\IResponsible;

trait GetResponse
{
	public function success_response(IResponsible $response)
    {
    	return $this->general_response($response->jsonize(), "", 200);
    }

    public function error_response($error)
    {
    	return $this->general_response("", $error, 403);
    }

    private function general_response($data = "", $error = "", $status_code = 200)
    {
    	return response()->json([
    		"data" => $data,
    		"error" => $error,
    		"status_code" => $status_code
    	],$status_code);
    }
}