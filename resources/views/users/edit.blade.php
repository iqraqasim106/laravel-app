
@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Edit User</h2>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                Back to Users
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email"
                               class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">New Password (optional)</label>
                        <input type="password" name="password" id="password"
                               class="form-control" minlength="8">
                        <small class="text-muted">
                            Leave blank if you do not want to change the password.
                        </small>
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light border">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
