@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="long_description" class="form-label">Mô tả chi tiết:</label>
            <textarea class="form-control" id="long_description" name="long_description">{{ $task->long_description }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="completed"
                   name="completed" {{ $task->completed ? 'checked' : '' }}>
            <label class="form-check-label" for="completed">Hoàn thành</label>
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
