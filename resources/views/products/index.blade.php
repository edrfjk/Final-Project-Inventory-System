@extends('layouts.app')

@section('content')
<style>
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
  }

  .page-header h1 {
    font-weight: 600;
    font-size: 1.8rem;
    color: #333;
  }

  .btn-add {
    background: linear-gradient(135deg, #4e73df, #224abe);
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #fff;
    font-weight: 500;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: 0.3s ease;
  }

  .btn-add:hover {
    background: linear-gradient(135deg, #5a82f0, #2d54c4);
    transform: translateY(-2px);
  }

  .card-container {
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  }

  table {
    border-radius: 12px;
    overflow: hidden;
  }

  thead th {
    background-color: #f4f6fa;
    color: #555;
    font-weight: 600;
  }

  tbody tr:hover {
    background-color: #f8f9fc;
  }

  .btn-sm {
    border-radius: 6px;
    padding: 5px 10px;
  }

  .btn-secondary {
    background-color: #6c757d;
    border: none;
  }

  .btn-secondary:hover {
    background-color: #5a6268;
  }

  .btn-danger {
    background-color: #e74a3b;
    border: none;
  }

  .btn-danger:hover {
    background-color: #c9302c;
  }
</style>

<div class="page-header">
  <h1>Products</h1>
  <a href="{{ route('products.create') }}" class="btn btn-add">➕ Add Product</a>
</div>

<div class="card-container">
  <table class="table table-hover align-middle mb-0">
    <thead>
      <tr>
        <th>Name</th>
        <th>SKU</th>
        <th>Quantity</th>
        <th>Reorder Level</th>
        <th class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($products as $p)
        <tr>
          <td><strong>{{ $p->name }}</strong></td>
          <td>{{ $p->sku }}</td>
          <td>{{ $p->quantity }}</td>
          <td>{{ $p->reorder_level }}</td>
          <td class="text-end">
            <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-secondary me-1">Edit</a>
            <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center text-muted py-4">No products found</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
