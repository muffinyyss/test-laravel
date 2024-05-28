@extends('layouts.app')
@section('title')
    Home page website ♡
@endsection
@section('content')
  <h2 style="text-align: center">blogs latest <3</h2> 
  <hr>
  @foreach ($blogs as $item)
      <h2>{{$item->title}}</h2>
      <p>{!!Str::limit($item->content, 100)!!}</p>
      <a href="/detail/{{$item->id}}">Read more</a>
      <hr>
  @endforeach
@endsection
