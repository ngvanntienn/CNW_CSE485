@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Task</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>

                <td>
                    {{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}
                </td>

                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">
                        Xem
                    </a>

                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('tasks.destroy', $task->id) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
