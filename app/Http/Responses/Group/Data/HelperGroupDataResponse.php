<?php

namespace App\Http\Responses\Group\Data;

use App\Http\Responses\Group\HelperGroupResponse;


/**
* 
*/
class HelperGroupDataResponse
{


	public static function render_data_item($data)
	{
		return [
      		'id' 			=> $data->id,
                  'caption' 		=> $data->caption,
                  'type' 		=> $data->type,
                  'created_at' 	=> HelperGroupResponse::render_date($data->created_at),
                  'updated_at' 	=> $data->updated_at,
                  'user'		=> HelperGroupResponse::render_user($data->user),
                  'images' 		=> $data->images->pluck('img'),
                  'links' 		=> $data->links->pluck('link'),
                  'voice_notes' 	=> $data->voice_notes->pluck('voice'),
		];
	}

}
