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
    
    <h1 style="margin: 50px 50px">Thêm Sách mới</h1>
    <form action="{{ route('books.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Tác giả</label>
            <select name="author" class="form-control" required>
                @foreach ($authors as $author)
                <option value = "{{$author->author}}">{{ $author ->author}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="program" class="form-label">Thể loại</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="mb-3">
            <label for="supervisor" class="form-label">Năm xuất bản</label>
            <input type="text" class="form-control" id="publication_year" name="publication_year" required>
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">ISBN</label>
            <textarea class="form-control" id="isbn" name="isbn" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="submission_date" class="form-label">Nguồn ảnh</label>
            <input type="date" class="form-control" id="cover_image_url" name="cover_image_url" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>