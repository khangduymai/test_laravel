<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
      return view('contact.create');
    }

  public function store(Request $request)
  {
    $dataValidation = $request->validate([
      'name' => ['required','min:3','string'],
      'email' => ['required', 'email'],
      'message' => ['required']
    ]);
    
    //dd($dataValidation);
    //dd(request()->all());
    Mail::to('test@test.com')->send(new ContactFormMail($dataValidation));

    session()->flash('message', 'Thanks for your message. We\'ll be in touch!');

    return redirect('contact');

    //using with() function to flash the message
    //return redirect('contact')->with('message','Thanks for your message. We\'ll be in touch!');

  }
}
