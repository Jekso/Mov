<?php

namespace App\Http\Responses\Group\Data;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;
use App\Http\Responses\Group\Data\HelperGroupDataResponse;

/**
* 
*/
class GroupGetSavedDataResponse implements IResponsible
{
	private $saved_data;

	function __construct($saved_data)
	{
		$this->saved_data = $saved_data;
	}

	public function jsonize()
	{
		return [
			'group_saved_data' 	=> $this->render_data($this->saved_data)
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
