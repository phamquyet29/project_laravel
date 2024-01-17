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
                    <a href="{{ route('products.index')}}" class="btn bg-warning float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên</strong>
                            <input type="text" name="name" class="form-control" placeholder="nhập tên sản phẩm">
                            @error('name')
                            <span class="text-danger">{{ 'vui lòng nhập tên ' }}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <strong>Giá</strong>
                            <input type="number" name="price" class="form-control" placeholder="nhập giá sản phẩm">
                            @error('price')
                            <span class="text-danger">{{ 'vui lòng nhập price ' }}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <strong>mô tả</strong>
                            <input type="text" name="description" class="form-control" placeholder="nhập mô tả sản phẩm">
                            @error('description')
                            <span class="text-danger">{{ 'vui lòng nhập description ' }}</span>
                             @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image"><strong>Ảnh sản phẩm</strong></label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ 'Bạn cần thêm ảnh' }}</span>
                            @enderror
                        </div>
                        <label for="category_id"><strong>Chọn danh mục</strong></label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->catname }}</option>
                            @endforeach
                        </select> 
                        @error('category_id')
                            <span class="text-danger">{{ 'Bạn phải chọn ' }}</span>
                        @enderror
                    </div>
                    
                    
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-2 w-25">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection