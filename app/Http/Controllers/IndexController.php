<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\FormMessage;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function contactForm(ContactFormRequest $request)
    {
        FormMessage::create($request->validated());
        Mail::to(config('mail.from.address'))->send(new ContactForm($request->validated()));

        return back();
    }
}
