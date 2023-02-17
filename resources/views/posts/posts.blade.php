<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Post page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid">
    <h1 class="mt-4 mb-4 fw-bold">Welcome to posts</h1>
    <div class="liveAlertPlaceholder"></div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success " >
      <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('info'))
    <div class="alert alert-info " >
      <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('delete'))
    <div class="alert alert-danger " >
      <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
      <div class="col mb-2">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create a Post</a>
      </div>
    </div>
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-md my-2">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ Str::words($post->description,10,' .....') }}</p>
            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-success">Show</a>
            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-warning">Edit</a>
            <form class="d-inline" action="{{ route('posts.destroy',$post->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>