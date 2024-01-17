@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản lý sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('products.create') }}" class="btn btn-primary float-end">Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{ Session::get('thongbao') }}    
                    </div> 
                @endif
                <table class="table table-borderred">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Id Category</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                                 <td>{{ $loop->iteration }}</td>
                                 <td>
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="max-width: 50px;">

                                </td>
                                <td>{{ $item->id }}</td>
                                
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->category_id }}</td>   
                                <td>{{ $item->category ? $item->category->catname : 'N/A' }}</td>
                                <td>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('products.destroy', $item->id) }}" method="POST">
                                        <a href="{{ route('products.edit', $item->id) }}" class="btn bg-warning">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $item->id }})">Xoá</button>
                                    </form>
                                </td>
                                @once
                                    <script>
                                        function confirmDelete(productId) {
                                            if (confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')) {
                                                document.getElementById('delete-form-' + productId).submit();
                                            }
                                            return false;
                                        }
                                    </script>
                                @endonce

                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <a class="btn btn-info" href="/categories">Category</a>
                </div>
            </div>
        </div>
    </div>
@endsection