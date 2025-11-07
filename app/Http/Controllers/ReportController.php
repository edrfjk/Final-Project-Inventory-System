<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use PDF; // from barryvdh/laravel-dompdf

class ReportController extends Controller
{
    public function stockHistory()
    {
        $stockIns = StockIn::with('product')->latest()->get();
        $stockOuts = StockOut::with('product')->latest()->get();
        $totals = Product::all();

        return view('reports.history', compact('stockIns', 'stockOuts', 'totals'));
    }

    public function generatePDF()
    {
        $stockIns = StockIn::with('product')->latest()->get();
        $stockOuts = StockOut::with('product')->latest()->get();
        $totals = Product::all();

        $pdf = PDF::loadView('reports.pdf', compact('stockIns', 'stockOuts', 'totals'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream('stock_report.pdf');
    }

    public function dashboard()
{
    $totalProducts = \App\Models\Product::count();
    $totalQuantity = \App\Models\Product::sum('quantity');
    $lowStock = \App\Models\Product::whereColumn('quantity', '<=', 'reorder_level')->get();

    return view('dashboard', compact('totalProducts', 'totalQuantity', 'lowStock'));
}

}
