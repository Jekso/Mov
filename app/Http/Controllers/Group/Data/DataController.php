<?php

namespace App\Http\Controllers\Group\Data;

use App\Data;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    
    public function index( )
    {
        return 'data index' ;
    }

    public function show()
    {
        return 'data show' ;
    }

    public function store( )
    {
        return 'data store' ;
    }

    public function update( )
    {
        return 'data update' ;
    }

    public function delete( )
    {
        return 'data delete' ;
    }

}
