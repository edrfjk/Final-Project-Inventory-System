@extends('layouts.app')

@section('content')
<style>
  .page-title {
    font-weight: 600;
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 25px;
  }

  .card-section {
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    margin-bottom: 40px;
  }

  .table thead {
    background: #f8f9fc;
    font-weight: 600;
  }

  .table tbody tr:nth-child(even) {
    background-color: #fafafa;
  }

  .btn-pdf {
    background: linear-gradient(135deg, #4e73df, #224abe);
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #fff;
    font-weight: 500;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: 0.3s ease;
  }

  .btn-pdf:hover {
    background: linear-gradient(135deg, #5a82f1, #1f3fa5);
    transform: translateY(-2px);
  }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="page-title">Stock History & Reports</h1>
  <a href="{{ route('reports.pdf') }}" class="btn btn-pdf" target="_blank">🧾 Generate PDF Report</a>
</div>

<div class="card-section">
  <h3 class="mb-3 text-success">Stock In</h3>
  <table class="table table-hover align-middle">
    <thead>
      <tr><th>Date</th><th>Product</th><th>Quantity</th><th>Remarks</th></tr>
    </thead>
    <tbody>
      @forelse($stockIns as $in)
        <tr>
          <td>{{ $in->date }}</td>
          <td>{{ $in->product->name }}</td>
          <td>{{ $in->quantity }}</td>
          <td>{{ $in->remarks }}</td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center text-muted">No stock-in records.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="card-section">
  <h3 class="mb-3 text-danger">Stock Out</h3>
  <table class="table table-hover align-middle">
    <thead>
      <tr><th>Date</th><th>Product</th><th>Quantity</th><th>Remarks</th></tr>
    </thead>
    <tbody>
      @forelse($stockOuts as $out)
        <tr>
          <td>{{ $out->date }}</td>
          <td>{{ $out->product->name }}</td>
          <td>{{ $out->quantity }}</td>
          <td>{{ $out->remarks }}</td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center text-muted">No stock-out records.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="card-section">
  <h3 class="mb-3 text-primary">Total Stocks per Product</h3>
  <table class="table table-bordered align-middle">
    <thead>
      <tr><th>Product</th><th>SKU</th><th>Current Quantity</th><th>Reorder Level</th></tr>
    </thead>
    <tbody>
      @forelse($totals as $p)
        <tr>
          <td>{{ $p->name }}</td>
          <td>{{ $p->sku }}</td>
          <td>{{ $p->quantity }}</td>
          <td>{{ $p->reorder_level }}</td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center text-muted">No products available.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
