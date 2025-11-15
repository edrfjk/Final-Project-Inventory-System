
<div>
    <h1 class="page-title">Dashboard Overview</h1>

<div class="row g-4">
  <div class="col-md-4">
    <div class="stat-card bg-gradient-blue">
      <div class="stat-icon">📦</div>
      <div>
        <h5 class="mb-1">Total Products</h5>
        <h2>{{ $totalProducts }}</h2>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="stat-card bg-gradient-green">
      <div class="stat-icon">📊</div>
      <div>
        <h5 class="mb-1">Total Quantity</h5>
        <h2>{{ $totalQuantity }}</h2>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="stat-card bg-gradient-orange">
      <div class="stat-icon">⚠️</div>
      <div>
        <h5 class="mb-1">Low Stock Items</h5>
        <h2>{{ $lowStock->count() }}</h2>
      </div>
    </div>
  </div>
</div>

<div class="low-stock-section">
    <h4 class="mb-3">⚠️ Low Stock Alerts</h4>

    @if($lowStock->count())
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                    <th>Reorder Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lowStock as $p)
                <tr class="table-warning">
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->sku }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>{{ $p->reorder_level }}</td>
                    <td>
                        <button wire:click="restock({{ $p->id }})" class="btn btn-sm btn-success">Restock +10</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No low stock items.</p>
    @endif
</div>

</div>
