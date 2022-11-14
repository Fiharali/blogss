<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

</style>

<body style="  background-color: rgb(170, 162, 162)">
    @include('navbar')
    @if (session()->has('success'))
        <div class=" row d-flex justify-content-center ">
            <div class="alert alert-info d-flex justify-content-center col-md-6">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class=" row d-flex justify-content-center">
            <div class="alert alert-danger col-md-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif
    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-8">
            <form action="{{ route('blog.update',$blog->title) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control" pattern="[A-z]*" 
                    value="{{ $blog->title }}" name="title" placeholder="title">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">body</label>
                    <textarea class="form-control"  name="body" rows="3"
                    pattern="[A-z]*" placeholder="body"> {{ $blog->body }}</textarea>
                </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
    </div>
</body>

</html>
