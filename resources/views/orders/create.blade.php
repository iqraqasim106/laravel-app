
@extends('layouts.app')

@section('title', 'Add Order')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Add New Order</h2>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Back to Orders</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Select User</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="">Choose a user</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" id="product_name"
                               class="form-control" value="{{ old('product_name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity"
                               class="form-control" value="{{ old('quantity', 1) }}"
                               min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price"
                               class="form-control" value="{{ old('price') }}"
                               min="0" step="0.01" required>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Order Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="Pending" selected>Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Order</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-light border">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
