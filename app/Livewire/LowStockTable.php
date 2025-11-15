<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class LowStockTable extends Component
{
    public function restock($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $product->quantity += 10;
            $product->save();
        }
    }

    public function render()
    {
        $totalProducts = Product::count();
        $totalQuantity = Product::sum('quantity');
        $lowStock = Product::whereColumn('quantity', '<', 'reorder_level')->get();

        return view('livewire.low-stock-table', compact('totalProducts', 'totalQuantity', 'lowStock'));
    }
}
