<?php

namespace App\Http\Responses\Group\Data;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;
use App\Http\Responses\Group\Data\HelperGroupDataResponse;

/**
* 
*/
class GroupDataStoreResponse implements IResponsible
{
	private $data;

	function __construct($data)
	{
		$this->data = $data;
	}

	public function jsonize()
	{
		return [
			'group_data' 	=> HelperGroupDataResponse::render_data_item($this->data), 
		];
	}

}
