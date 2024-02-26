<!-- resources/views/auth/change-password.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Change Password</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>
@endsection
