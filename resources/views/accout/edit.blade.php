@extends('layout')

@section('content')
    <div class="container-fluid h-100">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thông tin người dùng</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('users.index') }}" class="btn btn-primary float-end">Danh sách người dùng</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-15">
                            <div class="form-group">
                                <strong>Tên</strong>
                                <div class="form-control">
                                    {{ $user->name }}
                                </div>

                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <div class="form-control">
                                    {{ $user->email }}
                                </div>

                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <div class="form-control">
                                    {{ $user->password }}
                                </div>

                            </div>
                            <div class="form-group">
                                <strong>Role</strong>
                                <div class="form-control">
                                    {{ $user->role }}
                                </div>

                            </div>

                </form>
            </div>
        </div>
    </div>
@endsection
