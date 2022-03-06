<?php

namespace App\Rules;

use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{
    protected $threshold;

    public function __construct($threshold)
    {
        $this->threshold = $threshold;
    }

    public function passes($attribute, $value): bool
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6LdHOrseAAAAAA365Al-iaaZojsEVQQLdacro8VD',
            'response' => $value
        ])->json();

        if (! $response['success']) {
            return false;
        }

        if ($response['score'] < $this->threshold) {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return 'The validation error message.';
    }
}
