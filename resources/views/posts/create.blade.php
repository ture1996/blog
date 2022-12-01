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

@if(count($tags))
    <label class="form-label">Tags</label>
    @foreach ($tags as $tag)
    <div class="form-check">
        <input name = "tags[]" class="form-check-input" type="checkbox" value={{ $tag->id }} id="tag{{ $tag->id }}">
        <label class="form-check-label" for="tag{{ $tag->id }}">
          {{ $tag->name }}
        </label>
      </div>
    @endforeach
@endif

@error('tags')
    @include('partials.error')
@enderror

<button type="submit" class="btn btn-primary">Create post</button>
</form>
@endsection
