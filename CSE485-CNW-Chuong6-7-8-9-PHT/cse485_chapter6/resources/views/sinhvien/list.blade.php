@extends('layouts.app')
@section('content')
    <h2>Thêm Sinh viên</h2>
    <form action="{{ route('sinhvien.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            Tên sinh viên: <input type="text" name="ten_sinh_vien" required>
        </div>
        <div style="margin-bottom: 10px;">
            Email: <input type="email" name="email" required>
        </div>

        <button type="submit">Thêm</button>
    </form>
    <h2>Danh sách Sinh viên</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sinh viên</th>
                <th>Email</th>
            </tr>     
        </thead>
        
        <tbody>
            @foreach($danhSachSV as $sv)
            <tr>
                <td>{{$sv->id }}</td>
                <td>{{$sv->ten_sinh_vien}}</td>
                <td>{{$sv->email}}</td>
            </tr>
            @endforeach
        </tbody> 
    </table>
    
@endsection