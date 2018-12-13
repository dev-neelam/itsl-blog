@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Create Post</h1>
                <div class="col-md-4">
                    <form method="post" action="{{ route('post.form') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="id_title" name="title"
                                   aria-describedby="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="id_description" rows="3" name="description" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create post</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection


On line 22 – we added a url in our action parameter on our form. This is where the form will be submitted. The last thing we need to do is to update our home.blade.php file to make sure that our success message is reflected. Open home.blade.php file and make sure it has the following code:

@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Posts
                    <a href="{{ route('post.form') }}">
                        <button type="button" class="btn btn-primary btn-sm">Create Post</button>
                    </a>
                </h1>
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                            <div id="message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
            </main>
        </div>
    </div>
@endsection