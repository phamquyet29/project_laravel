@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Cập nhật sản phẩm</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('products.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên</strong>
                            <input type="text" value="{{ $product->name }}" name="name" class="form-control" placeholder="nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>Giá</strong>
                            <input type="number" value="{{ $product->price }}" name="price" class="form-control" placeholder="nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>mô tả</strong>
                            <input type="text" value="{{ $product->description }}" name="description" class="form-control" placeholder="nhập mô tả sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Id Category</strong>
                            <input type="number" value="{{ $product->category_id }}" name="category_id" class="form-control" placeholder="category_id">
                        </div>
                        
                    
                </div>
                <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
    
@endsection