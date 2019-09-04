@extends('layouts.app')

@section('title','Customer List')


@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Customer List</h1>

      <a href="/customers/create"><button class="btn btn-primary" style="margin-bottom:10px">New Customer</button></a>
     
    </div>
  </div>

  @foreach($customers as $customer)
  <div class="row">
    <div class="col-2">
      {{$customer->id}}
    </div>
    <div class="col-4">
      <a href="/customers/{{$customer->id}}"> {{$customer->name}} </a>
    </div>
    <div class="col-4">{{$customer->company->name}}</div>
    <div class="col-2">{{$customer->active}}</div>
  </div>
  @endforeach

</div>

@endsection