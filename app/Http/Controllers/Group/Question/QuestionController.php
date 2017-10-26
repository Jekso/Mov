<?php

namespace App\Http\Controllers\Group\Question;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    
    public function index( )
    {
        return 'question index' ;
    }

    public function show()
    {
        return 'question show' ;
    }

    public function store( )
    {
        return 'question store' ;
    }

    public function update( )
    {
        return 'question update' ;
    }

    public function delete( )
    {
        return 'question delete' ;
    }

}
