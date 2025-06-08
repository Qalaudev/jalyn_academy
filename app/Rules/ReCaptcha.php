<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;


class ReCaptcha implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $value,
        ])->json();

        // Лог
        \Log::info('ReCaptcha Rule response:', $response);

        if (! ($response['success'] ?? false)) {
            $fail('reCAPTCHA тексеруі сәтсіз.');
        }
    }
}
