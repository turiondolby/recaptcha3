<?php

namespace App\Http\Controllers;

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
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6LdHOrseAAAAAA365Al-iaaZojsEVQQLdacro8VD',
            'response' => $request->recaptchaToken
        ])->json();

        if (! $response['success']) {
            return false;
        }

        if ($response['score'] < 0.7) {
            return false;
        }

        dd($response);
    }
}
