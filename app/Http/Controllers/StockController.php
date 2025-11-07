<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockController extends Controller
{
    public function inForm()
    {
        $products = Product::orderBy('name')->get();
        return view('stock.in', compact('products'));
    }

    public function storeIn(Request $request)
    {
        $data = $request->validate([
            'product_id'=>'required|exists:products,id',
            'quantity'=>'required|integer|min:1',
            'date'=>'nullable|date',
            'remarks'=>'nullable|string',
        ]);

        DB::transaction(function() use ($data) {
            $stockIn = StockIn::create([
                'product_id'=>$data['product_id'],
                'quantity'=>$data['quantity'],
                'date'=>$data['date'] ?? Carbon::today(),
                'remarks'=>$data['remarks'] ?? null,
            ]);

            $product = Product::find($data['product_id']);
            $product->quantity += $data['quantity'];
            $product->save();
        });

        return redirect()->route('stock.in')->with('success','Stock added.');
    }

    public function outForm()
    {
        $products = Product::orderBy('name')->get();
        return view('stock.out', compact('products'));
    }

    public function storeOut(Request $request)
    {
        $data = $request->validate([
            'product_id'=>'required|exists:products,id',
            'quantity'=>'required|integer|min:1',
            'date'=>'nullable|date',
            'remarks'=>'nullable|string',
        ]);

        $product = Product::findOrFail($data['product_id']);
        if ($product->quantity < $data['quantity']) {
            return back()->withErrors(['quantity'=>'Not enough stock to remove.'])->withInput();
        }

        DB::transaction(function() use ($data) {
            StockOut::create([
                'product_id'=>$data['product_id'],
                'quantity'=>$data['quantity'],
                'date'=>$data['date'] ?? Carbon::today(),
                'remarks'=>$data['remarks'] ?? null,
            ]);

            $product = Product::find($data['product_id']);
            $product->quantity -= $data['quantity'];
            $product->save();
        });

        return redirect()->route('stock.out')->with('success','Stock removed.');
    }
}
