<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Inventory System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  @livewireStyles

  <style>
    body {
      background-color: #f6f8fb;
      font-family: "Poppins", sans-serif;
    }

    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background: linear-gradient(180deg, #2b5876, #4e4376);
      color: white;
      display: flex;
      flex-direction: column;
      padding: 1.5rem 1rem;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .sidebar a {
      color: #e0e0e0;
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 8px;
      display: block;
      margin-bottom: 8px;
      transition: 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #ffffff20;
      color: #fff;
    }

    .content {
      margin-left: 260px;
      padding: 30px;
      transition: all 0.3s ease;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .alert {
      border-radius: 10px;
    }

    .table th {
      background-color: #f0f3f7;
    }

    .navbar-brand {
      color: white !important;
      font-weight: bold;
      letter-spacing: 0.5px;
    }
  </style>
</head>

<body>

  <div class="sidebar">
    <h4>Inventory System</h4>
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
    <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">📋 Products</a>
    <a href="{{ route('stock.in') }}" class="{{ request()->routeIs('stock.in*') ? 'active' : '' }}">⬆️ Stock In</a>
    <a href="{{ route('stock.out') }}" class="{{ request()->routeIs('stock.out*') ? 'active' : '' }}">⬇️ Stock Out</a>
    <a href="{{ route('reports.history') }}" class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">📈 Reports</a>
  </div>

  <div class="content">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </div>

  @livewireScripts

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
