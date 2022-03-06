<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store()
    {
        //validation

        dd('store post');
    }
}
