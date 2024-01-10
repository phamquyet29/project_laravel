@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Thêm Danh Mục</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary float-end">Danh sách danh mục</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="catname"><strong>Tên danh mục</strong></label>
                    <input type="text" name="catname" class="form-control" placeholder="Nhập tên danh mục">
                </div>
                <button type="submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>
</div>
    
@endsection
