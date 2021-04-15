<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function home()
    {
        return 'Home @ TaskController';
    }
    public function home2(){
        return '<center> Hora do papá </center>';
    }
}
