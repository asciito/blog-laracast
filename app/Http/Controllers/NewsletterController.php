<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{

    /**
     * @param Newsletter $newsletter
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to out newsletter list.'
            ]);
        }

        return redirect('/')->with('success', 'Now you\'re subscribed to our newsleetter');
    }
}
