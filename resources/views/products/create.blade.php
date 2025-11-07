@extends('layouts.app')

@section('content')
<style>
  .page-title {
    font-weight: 600;
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 25px;
  }

  .form-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    max-width: 600px;
  }

  label {
    font-weight: 500;
    color: #555;
  }

  .form-control {
    border-radius: 10px;
    border: 1px solid #ced4da;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    transition: 0.2s ease;
  }

  .form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 5px rgba(78,115,223,0.3);
  }

  .btn-save {
    background: linear-gradient(135deg, #4e73df, #224abe);
    border: none;
    border-radius: 10px;
    padding: 10px 25px;
    color: #fff;
    font-weight: 500;
    transition: 0.3s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  }

  .btn-save:hover {
    background: linear-gradient(135deg, #5a82f0, #2d54c4);
    transform: translateY(-2px);
  }

  .btn-cancel {
    color: #6c757d;
    text-decoration: none;
    font-weight: 500;
  }

  .btn-cancel:hover {
    color: #343a40;
    text-decoration: underline;
  }
</style>

<h1 class="page-title">Add New Product</h1>

<div class="form-card">
  <form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label for="sku" class="form-label">SKU (optional)</label>
      <input id="sku" name="sku" class="form-control" value="{{ old('sku') }}">
    </div>

    <div class="mb-3">
      <label for="quantity" class="form-label">Quantity</label>
      <input id="quantity" name="quantity" type="number" class="form-control" value="{{ old('quantity',0) }}" min="0" required>
    </div>

    <div class="mb-4">
      <label for="reorder_level" class="form-label">Reorder Level</label>
      <input id="reorder_level" name="reorder_level" type="number" class="form-control" value="{{ old('reorder_level',0) }}" min="0">
    </div>

    <div class="d-flex align-items-center gap-3">
      <button class="btn btn-save">Save Product</button>
      <a href="{{ route('products.index') }}" class="btn-cancel">Cancel</a>
    </div>
  </form>
</div>
@endsection
