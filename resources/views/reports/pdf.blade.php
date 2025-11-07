<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Stock Report</title>
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
    h2, h3 { text-align: center; margin-bottom: 10px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
    th { background: #f0f0f0; }
  </style>
</head>
<body>
  <h2>📊 Inventory Stock Report</h2>
  <p>Date Generated: {{ now()->format('F d, Y h:i A') }}</p>

  <h3>Stock In</h3>
  <table>
    <thead><tr><th>Date</th><th>Product</th><th>Qty</th><th>Remarks</th></tr></thead>
    <tbody>
      @foreach($stockIns as $in)
        <tr>
          <td>{{ $in->date }}</td>
          <td>{{ $in->product->name }}</td>
          <td>{{ $in->quantity }}</td>
          <td>{{ $in->remarks }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <h3>Stock Out</h3>
  <table>
    <thead><tr><th>Date</th><th>Product</th><th>Qty</th><th>Remarks</th></tr></thead>
    <tbody>
      @foreach($stockOuts as $out)
        <tr>
          <td>{{ $out->date }}</td>
          <td>{{ $out->product->name }}</td>
          <td>{{ $out->quantity }}</td>
          <td>{{ $out->remarks }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <h3>Total Stocks per Product</h3>
  <table>
    <thead><tr><th>Product</th><th>SKU</th><th>Current Qty</th><th>Reorder Level</th></tr></thead>
    <tbody>
      @foreach($totals as $p)
        <tr>
          <td>{{ $p->name }}</td>
          <td>{{ $p->sku }}</td>
          <td>{{ $p->quantity }}</td>
          <td>{{ $p->reorder_level }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
