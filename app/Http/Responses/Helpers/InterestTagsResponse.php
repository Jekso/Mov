<?php

namespace App\Http\Responses\Helpers;

use App\Http\Responses\IResponsible;
use Illuminate\Database\Eloquent\Collection;

/**
* 
*/
class InterestTagsResponse implements IResponsible
{
	private $tags ;

	function __construct(Collection $tags)
	{
		$this->tags = $tags;
	}

	public function jsonize()
	{
		return ['tags' => $this->tags->pluck('tag', 'id')];
	}
}
