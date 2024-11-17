<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    //
    public function index(){

        $posts = post::all();

        return view('welcome', compact('posts'));
    }
}
