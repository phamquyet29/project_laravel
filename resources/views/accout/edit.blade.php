@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Cập nhật danh mục</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('users.index')}}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên</strong>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>Password</strong>
                            <input type="text" value="{{ $user->password }}" name="password" class="form-control" placeholder="nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>Role</strong>
                            <input type="number" value="{{ $user->role }}" name="role" class="form-control" placeholder="nhập tên sản phẩm">
                        </div>
                <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
    
@endsection