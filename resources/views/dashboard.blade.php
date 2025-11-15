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



<livewire:low-stock-table wire:poll.5s />

@endsection
