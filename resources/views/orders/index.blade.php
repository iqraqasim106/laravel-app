
@extends('layouts.app')

@section('title', 'Manage Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Order Management</h2>
        <p class="text-muted mb-0">Create and manage customer orders.</p>
    </div>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">+ Add Order</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'User unavailable' }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>Rs. {{ number_format((float) $order->price, 2) }}</td>
                            <td>
                                <span class="badge text-bg-secondary">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('orders.edit', $order) }}"
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('orders.destroy', $order) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this order?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No orders found. Click Add Order to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $orders->links() }}
    </div>
</div>
@endsection
