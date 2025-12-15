<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style>
    body { 
        background-color: #f8f9fa; 
    }
    .form-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-top: 50px;
    }
    .form-container h3 { 
        margin-bottom: 25px; 
    }
    .form-control, .btn { 
        border-radius: 8px; 
    }
  </style>
</head>
<body>
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6 form-container">
      <h3>Update Post</h3>
      <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group mb-3">
          <label for="body">Body</label>
          <textarea class="form-control" id="body" name="body" rows="5" required>{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Update Post</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
