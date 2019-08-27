<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
  }
}
