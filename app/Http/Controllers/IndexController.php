<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function contactForm(ContactFormRequest $request)
    {
        Mail::to(config('mail.from.address'))->send(new ContactForm($request->validated()));

        return back();
    }
}
