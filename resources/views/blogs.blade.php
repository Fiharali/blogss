<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blogs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<style>
    a{
        text-decoration: none;
        color: black;
    }
</style>
<body style="background-color: rgb(185, 246, 159)">
    @include('navbar')
    @if (session()->has('success'))
        <div class=" row d-flex justify-content-center ">
            <div class="alert alert-info d-flex justify-content-center col-md-6">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <div class="row m-4">
        <div class="col-md-12 ">
            <div class="row">
                @foreach ( $blogs as $blog )     
                <div class="col-md-4 my-4  d-flex justify-content-center">
                    <div class="card bg-dark text-light " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->body }}</p>
                            <button><a href="{{ route('blog.show',$blog->title) }}">show</a></button>
                        </div>
                    </div>
                </div>
                @endforeach  
            </div>
            <div class="d-flex justify-content-center my-5">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>

</body>

</html>
