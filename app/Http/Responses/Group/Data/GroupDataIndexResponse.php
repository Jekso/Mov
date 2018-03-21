<?php

namespace App\Http\Responses\Group\Data;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;
use App\Http\Responses\Group\Data\HelperGroupDataResponse;

/**
* 
*/
class GroupDataIndexResponse implements IResponsible
{
	private $group_with_data;

	function __construct($group_with_data)
	{
		$this->group_with_data = $group_with_data;
	}

	public function jsonize()
	{
		return [
			'group' 			=> HelperGroupResponse::render_group($this->group_with_data),
			'group_data' 		=> $this->render_data($this->group_with_data->data)
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
