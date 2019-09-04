@extends('layouts.app')

@section('title','Add Customer')


@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <h1>Add New Customer</h1>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <form action="/customers" method="POST" class="pb-4">
        @csrf

        @include('customers.form')

        <div style="margin-top:15px">
          <button class="btn btn-primary" type="submit">Add Customer</button>
        </div>

      </form>
    </div>
  </div>

</div>

@endsection