<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //Send email
        Mail::to('test@test.com')->send(new ContactFormMail($data));


        //redirect to contact form with message Success
        return redirect('contact-us')->with('message','Thank you for your message.');

        /* Other method to redirect to contact form with message Success
         session()->flash('message','Thank you for your message.');
         return redirect('contact');
         */
    }
}
