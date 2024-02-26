@extends('layout')

@section('content')
<div class="container-fluid h-100">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Cập nhật danh mục</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('categories.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $categories->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên</strong>
                            <input type="text" value="{{ $categories->name }}" name="name" class="form-control" placeholder="nhập tên sản phẩm">
                        </div>
                        
                <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
    
@endsection