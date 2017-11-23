<?php

namespace App\Http\Controllers;

use App\Http\Traits\GetResponse;
use App\Http\Responses\IResponsible;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    // use GetResponse trait
    use GetResponse;
}
