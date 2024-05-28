@extends('layouts.app')
@section('title')
    PDF ♡
@endsection
@section('content')
<!-- resources/views/pdf_form.blade.php -->

    <form action="{{ route('generate-pdf') }}" method="POST">
        @csrf
        <label for="title" class="mb-3">Title:</label>
        <input class="form-control" type="text" id="title" name="title" required ><br><br>


        <label for="content" class="mb-3" >Content:</label><br>
        <textarea class="form-control" id="content" name="content" rows="10" cols="50" required></textarea><br><br>

        <button type="submit" class="btn btn-outline-success">Generate PDF</button>
    </form>


@endsection
