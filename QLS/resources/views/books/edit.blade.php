<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin sách</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
    </div>
    <div class="form-group">
        <label for="author">Tác giả</label>
        <select name="author" class="form-control" required>
        @foreach($authors as $author)
            <option value="{{ $author->author }}" {{$author->author == $book->author ? 'selected': ''}}>{{$author->author}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="program">Thể loại</label>
        <input type="text" name="genre" class="form-control" value="{{ $book->genre }}" required>
    </div>
    <div class="form-group">
        <label for="supervisor">Năm xuất bản</label>
        <input type="text" name="publication_year" class="form-control" value="{{ $book->publication_year }}" required>
    </div>
    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="date" name="isbn" class="form-control" value="{{ $book->isbn }}">
    </div>
    <div class="form-group">
        <label for="cover_image_url">Nguồn ảnh</label>
        <input type="date" name="cover_image_url" class="form-control" value="{{ $book->cover_image_url }}">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>