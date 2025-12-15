<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand h1" href="{{ route('posts.index') }}">CRUDPosts</a>
    <div class="d-flex">
      <a class="btn btn-sm btn-success" href="{{ route('posts.create') }}">Add Post</a>
    </div>
  </div>
</nav>
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<div class="container mt-5">
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <div class="card-header">
            <h5 class="card-title">{{ $post->title }}</h5>
          </div>
          <div class="card-body">
            <p class="card-text">{{ $post->body }}</p>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
</body>
</html>
