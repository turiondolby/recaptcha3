<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'recaptchaToken' => ['required', new Recaptcha(0.7)]
        ]);

        dd('store post');
    }
}
