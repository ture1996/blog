@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')

<form method = "POST" action="/register">

@csrf

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text"  name = "name" class="form-control" id="exampleFormControlInput1" >
</div>

@error('name')
@include('partials.error')
@enderror

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Email</label>
  <input name = "email" class="form-control" id="exampleFormControlTextarea1" >
</div>

@error('email')
@include('partials.error')
@enderror

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Password</label>
  <input name = "password" class="form-control" id="exampleFormControlTextarea1" >
</div>

@error('password')
@include('partials.error')
@enderror

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">How old are you</label>
  <input name = "age" type="number" class="form-control" id="exampleFormControlTextarea1" >
</div>

<button type="submit">Sign Up</button>
</form>

@endsection