@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản lý danh mục</h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Id</th>
                            <th>Tên danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->catname }}</td>
                                <td>
                                    {{-- <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Sửa</a> --}}
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('products.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
            </div>
        </div>
    </div>
@endsection
