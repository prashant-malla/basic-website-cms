<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\ValidationRule;

class reCAPTCHA implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $value,
            'ip' => request()->ip(),
        ]);

        if ($response->successful() && $response->json('success') && $response->json('score') > config('services.recaptcha.min_score')) {
            return;
        }

        $fail(__('The reCAPTCHA verification failed. Please try again.'));
    }
}
