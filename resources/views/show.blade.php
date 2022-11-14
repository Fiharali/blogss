<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>{{ $blog->title }}</title>
</head>
<style>
    body {
        background-color: #eee;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
@include('navbar')
    <div class="row m-4">
        <div class="col-md-12 d-flex justify-content-center ">
            <div class="row">
                <div class="col-md-12 my-4  d-flex justify-content-center">
                    <div class="card bg-dark text-light  " style="width: 300px;height: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->body }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('blog.edit',$blog->title) }}" class="btn btn-info"> update</a>
                <form action="{{ route('blog.delete',$blog->title) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger col-md-12   d-flex justify-content-center"> delete</button>

                </form>
            </div>

        </div>
    </div>

</body>

</html>
