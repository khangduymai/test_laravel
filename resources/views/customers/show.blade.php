@extends('layouts.app')

@section('title','Detail for ' . $customer->name)


@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Detail for {{$customer->name}}</h1>

      <a href='/customers/{{ $customer->id }}/edit'><button class="btn btn-primary" style="margin-bottom:10px">Edit</button></a>

      <form action="/customers/{{ $customer->id }}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
    </div>
  </div>

  <div class="row" style="margin-top:10px">
    <div class="col-12">
      <p><strong>Name</strong> {{$customer->name}}</p>
      <p><strong>Email</strong> {{$customer->email}}</p>
      <p><strong>Company</strong> {{$customer->company->name}}</p>
    </div>
  </div>

</div>

@endsection