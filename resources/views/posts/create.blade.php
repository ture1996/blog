@extends('layouts.master')

@section('title', 'Create New Posts')

@section('content')
<form method = "POST" action="/posts">

@csrf

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input type="text"  name = "title" class="form-control" id="exampleFormControlInput1" >
</div>

@error('title')
@include('partials.error')
@enderror
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Body</label>
  <textarea name = "body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@error('body')
@include('partials.error')
@enderror
<button type="submit">Create post</button>
</form>
@endsection