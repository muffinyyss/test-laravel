@extends('layouts.app')
@section('title')
    About me ♡
@endsection
@section('content')
    <h2 style="text-align: center">About me <3</h2>
    <hr>
    <p>ผู้พัฒนาระบบ : {{$name}}</p>
    <p>วันที่เริ่มทำโปรเจค : {{$date}}</p>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur ducimus quasi placeat, sapiente
        necessitatibus nostrum animi blanditiis adipisci dolorem consequuntur a, at quis aspernatur error dolorum
        ex, voluptatibus repellendus itaque!</p>
@endsection
