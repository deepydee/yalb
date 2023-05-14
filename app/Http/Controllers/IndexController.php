<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Category;
use App\Models\FormMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $goods = Category::whereSlug('tovary')
            ->with('children.media')
            ->get();

        $repair = Category::whereSlug('remont')
            ->with('children.media')
            ->get();

        return view('index', compact('goods', 'repair'));
    }

    public function contactForm(ContactFormRequest $request)
    {
        FormMessage::create($request->validated());
        Mail::to(config('mail.from.address'))->send(new ContactForm($request->validated()));

        return back();
    }
}
