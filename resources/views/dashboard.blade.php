@extends('layouts.app')

@section('content')
<style>
  .page-title {
    font-weight: 600;
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    color: #333;
  }

  .stat-card {
    border: none;
    border-radius: 20px;
    color: white;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: 0.3s ease;
  }

  .stat-card:hover {
    transform: translateY(-5px);
  }

  .stat-icon {
    font-size: 2.5rem;
    margin-right: 1rem;
    opacity: 0.9;
  }

  .bg-gradient-blue {
    background: linear-gradient(135deg, #4e73df, #224abe);
  }

  .bg-gradient-green {
    background: linear-gradient(135deg, #1cc88a, #0e9f6e);
  }

  .bg-gradient-orange {
    background: linear-gradient(135deg, #f6c23e, #dda20a);
  }

  .low-stock-section {
    background: white;
    border-radius: 15px;
    padding: 20px;
    margin-top: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  }

  .table th {
    background-color: #f1f3f7;
  }
</style>

<h1 class="page-title">Dashboard Overview</h1>

<div class="row g-4">
  <div class="col-md-4">
    <div class="stat-card bg-gradient-blue">
      <div class="stat-icon">📦</div>
      <div>
        <h5 class="mb-1">Total Products</h5>
        <h2>{{ $totalProducts ?? 0 }}</h2>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="stat-card bg-gradient-green">
      <div class="stat-icon">📊</div>
      <div>
        <h5 class="mb-1">Total Quantity</h5>
        <h2>{{ $totalQuantity ?? 0 }}</h2>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="stat-card bg-gradient-orange">
      <div class="stat-icon">⚠️</div>
      <div>
        <h5 class="mb-1">Low Stock Items</h5>
        <h2>{{ isset($lowStock) ? $lowStock->count() : 0 }}</h2>
      </div>
    </div>
  </div>
</div>

@if(!empty($lowStock) && $lowStock->count())
  <div class="low-stock-section">
    <h4 class="mb-3">⚠️ Low Stock Alerts</h4>
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Product</th>
          <th>SKU</th>
          <th>Quantity</th>
          <th>Reorder Level</th>
        </tr>
      </thead>
      <tbody>
        @foreach($lowStock as $p)
          <tr class="table-warning">
            <td><strong>{{ $p->name }}</strong></td>
            <td>{{ $p->sku }}</td>
            <td>{{ $p->quantity }}</td>
            <td>{{ $p->reorder_level }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif
@endsection
