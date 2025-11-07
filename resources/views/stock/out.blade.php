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
    border-color: #e74a3b;
    box-shadow: 0 0 5px rgba(231,74,59,0.3);
  }

  .btn-remove {
    background: linear-gradient(135deg, #e74a3b, #d63324);
    border: none;
    border-radius: 10px;
    padding: 10px 25px;
    color: #fff;
    font-weight: 500;
    transition: 0.3s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  }

  .btn-remove:hover {
    background: linear-gradient(135deg, #f05a4b, #c52e1f);
    transform: translateY(-2px);
  }

  textarea {
    resize: vertical;
    min-height: 80px;
  }
</style>

<h1 class="page-title">Stock Out</h1>

<div class="form-card">
  <form action="{{ route('stock.out.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="product_id" class="form-label">Select Product</label>
      <select name="product_id" id="product_id" class="form-control" required>
        <option value="">-- Choose Product --</option>
        @foreach($products as $p)
          <option value="{{ $p->id }}" {{ old('product_id')==$p->id ? 'selected':'' }}>
            {{ $p->name }} ({{ $p->sku }}) — Current: {{ $p->quantity }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="quantity" class="form-label">Quantity</label>
      <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="{{ old('quantity',1) }}" required>
    </div>

    <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input type="date" id="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}">
    </div>

    <div class="mb-4">
      <label for="remarks" class="form-label">Remarks</label>
      <textarea id="remarks" name="remarks" class="form-control">{{ old('remarks') }}</textarea>
    </div>

    <button class="btn btn-remove">Remove Stock</button>
  </form>
</div>
@endsection
