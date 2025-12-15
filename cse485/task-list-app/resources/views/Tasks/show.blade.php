@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title mb-4">Chi tiết Task</h1>

            <p><strong>Tiêu đề:</strong> {{ $task->title }}</p>
            <p><strong>Mô tả:</strong> {{ $task->description }}</p>
            <p><strong>Mô tả chi tiết:</strong> {{ $task->long_description }}</p>
            <p>
                <strong>Trạng thái:</strong>
                <span class="badge bg-{{ $task->completed ? 'success' : 'secondary' }}">
                    {{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}
                </span>
            </p>

            <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">
                Quay lại
            </a>
        </div>
    </div>

</div>
@endsection
