<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'sku'=>'nullable|string|unique:products,sku',
            'quantity'=>'required|integer|min:0',
            'reorder_level'=>'nullable|integer|min:0',
        ]);

        if(empty($data['sku'])) {
            $data['sku'] = strtoupper('SKU-'.Str::random(6));
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success','Product created.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'sku'=>'nullable|string|unique:products,sku,'.$product->id,
            'quantity'=>'required|integer|min:0',
            'reorder_level'=>'nullable|integer|min:0',
        ]);

        $product->update($data);
        return redirect()->route('products.index')->with('success','Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted.');
    }
}
