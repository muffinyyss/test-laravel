@extends('layouts.app')
@section('title')
    {{$blog->title}} ♡
@endsection
@section('content')
    <h2>{{$blog->title}} <3</h2> 
    <hr>
    {!!$blog->content!!}
@endsection
