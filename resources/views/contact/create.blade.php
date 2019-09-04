@extends('layouts.app')

@section('title','Contact')


@section('content')
<div class="container">
  <h1>Contact Us</h1>

  <form action="/contact" method="POST" class="pb-4">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" id="name" type="text" name="name" value=" {{ old('name') }}">
    </div>
    @if($errors->has('name'))
    <div class="alert alert-danger" role="alert" style="margin-top:10px">
      {{ $errors->first('name') }}
    </div>
    @endif

    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" id="email" type="email" name="email" value=" {{ old('email')  }} ">
    </div>
    @if($errors->has('email'))
    <div class="alert alert-danger" role="alert" style="margin-top:10px">
      {{ $errors->first('email') }}
    </div>
    @endif

    <div class="form-group">

      <label for=" message">Message</label>

      <textarea class="form-control" id="message" name="message" cols="30" rows="10">{{ old('message') }}</textarea>

    </div>
    @if($errors->has('message'))
    <div class="alert alert-danger" role="alert" style="margin-top:10px">
      {{ $errors->first('message') }}
    </div>
    @endif

    <div style="margin-top:15px">
      <button class="btn btn-primary" type="submit">Send Message</button>
    </div>
  </form>
</div>

@endsection