@extends('layouts.app')
@section('title')
    New Post ♡
@endsection
@section('content')
    <h2 style="text-align: center">New Post <3</h2>
            <div class="row mt-2">
                <div class="col-lg-3 col-md-2 col-sm-1"></div>
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="card border">
                        <div class="card-header text-center text-bg-info">To-Do List</div>
                        <div class="card-body">
                            <form method="POST" action="/author/insert">
                                @csrf
                                <div class="row mt-3">
                                    <label for="title" class="col-lg-3 col-form-label">Title</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="title" class="form-control">
                                        @error('title')
                                            <div class="dy-2">
                                                <span class="text text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="content" class="col-lg-3 col-form-label">Something</label>
                                    <div class="col-lg-9">
                                        <textarea name="content" id="content" cols="40" rows="10" class="form-control"></textarea>
                                        @error('content')
                                            <div class="dy-2">
                                                <span class="text text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-9 d-flex justify-content-end ">
                                        <button type="submit" class="btn btn-success">submit</button>
                                        <a href="/author/blog" class="btn btn-primary ms-3">back</a>
                                    </div>
                                </div>

                            </form>
                            <script>
                                ClassicEditor
                                    .create( document.querySelector( '#content' ) )
                                    .catch( error => {
                                        console.error( error );
                                    } );
                            </script>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-1"></div>
            </div>
        @endsection
