<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueJsController extends Controller
{
    public function index()
    {
    	return view('vuejs.demo');
    }
}
