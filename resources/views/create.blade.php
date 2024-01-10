@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Thêm sản phẩm</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('products.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên</strong>
                            <input type="text" name="name" class="form-control" placeholder="nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>Giá</strong>
                            <input type="number" name="price" class="form-control" placeholder="nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>mô tả</strong>
                            <input type="text" name="description" class="form-control" placeholder="nhập mô tả sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Id Category</strong>
                            <input type="number" name="category_id" class="form-control" placeholder="category_id">
                        </div>
                        
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Thêm</button>
            </form>
        </div>
    </div>
</div>
    
@endsection