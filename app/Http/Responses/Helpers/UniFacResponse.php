<?php

namespace App\Http\Responses\Helpers;

use App\Http\Responses\IResponsible;
use Illuminate\Database\Eloquent\Collection;

/**
* 
*/
class UniFacResponse implements IResponsible
{
	private $universities, $faculties ;

	function __construct($universities, $faculties)
	{
		$this->universities = $universities;
		$this->faculties = $faculties;
	}

	public function jsonize()
	{
		return ['universities' => $this->universities, 'faculties' => $this->faculties];
	}
}
