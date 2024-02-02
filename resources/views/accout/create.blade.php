@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm Người dùng</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('users.index') }}" class="btn btn-primary float-end">Danh sách người dùng</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="name@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="number" name="role" class="form-control" id="role" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>

            </div>
        </div>
    </div>
@endsection
