<?php

namespace App\Http\Responses\Group\Data;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;
use App\Http\Responses\Group\Data\HelperGroupDataResponse;

/**
* 
*/
class GroupSearchInDepthDataResponse implements IResponsible
{
	private $keyword, $images, $voices;

	function __construct($keyword, $images, $voices)
	{
		$this->images = $images;
		$this->voices = $voices;
		$this->keyword = $keyword;
	}

	public function jsonize()
	{
		return [
			'keyword'		=> $this->keyword,
			'images' 		=> $this->render_images($this->images),
			'voice_notes'	=> $this->render_voices($this->voices)
		];
	}


	private function render_images($images)
	{
		$all = [];
		foreach ($images as $image)
		{
			$all[] = [
		        'vertices_1_x'		=> $image->vertices_1_x,
		        'vertices_1_y'		=> $image->vertices_1_y,
		        'vertices_2_x'		=> $image->vertices_2_x,
		        'vertices_2_y'		=> $image->vertices_2_y,
		        'vertices_3_x'		=> $image->vertices_3_x,
		        'vertices_3_y'		=> $image->vertices_3_y,
		        'vertices_4_x'		=> $image->vertices_4_x,
		        'vertices_4_y'		=> $image->vertices_4_y,
		        'image_path'		=> $image->image->img
			];
		}
		return $all;
	}



	private function render_voices($voices)
	{
		$all = [];
		foreach ($voices as $voice)
		{
			$all[] = [
		        'start_time'		=> $voice->start_time,
		        'end_time'			=> $voice->end_time,
		        'voice_note_path'	=> $voice->voice->voice
			];
		}
		return $all;
	}


}
