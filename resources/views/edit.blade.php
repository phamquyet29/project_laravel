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
                    <a href="{{ route('products.index')}}" class="btn bg-warning float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="image"><strong>Ảnh sản phẩm</strong></label>
                            
                            <input type="file" name="image" class="form-control">
                            
                            @error('image')
                                <span class="text-danger">{{ 'Bạn cần thêm ảnh' }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="current_image"><strong>Ảnh hiện tại</strong></label>
                            <br>
                            <img src="{{ asset('storage/avatars/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 50px;">

                            <input type="hidden" name="current_image" value="{{ $product->image }}">
                        </div>
                        <label for="category_id"><strong>Chọn danh mục</strong></label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="{{ $product->category_id  }} " >{{ $product->category_id  }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->catname }}</option>
                            @endforeach
                        </select> 
                      
                        
                    
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-2 w-25 ">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection