<?php

namespace App\Http\Responses\Group\Data;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;
use App\Http\Responses\Group\Data\HelperGroupDataResponse;

/**
* 
*/
class GroupNormalSearchDataResponse implements IResponsible
{
	private $data;

	function __construct($data)
	{
		$this->data = $data;
	}

	public function jsonize()
	{
		return [
			'search_result_data' 	=> $this->render_data($this->data)
		];
	}


	private function render_data($data)
	{
		$all = [];
		foreach ($data as $d)
			$all[] = HelperGroupDataResponse::render_data_item($d);
		return $all;
	}


}
