<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Queries\ProductQueries;

class ProductController extends Controller
{

    protected $productQueries;

    public function __construct(ProductQueries $productQueries)
    {
        $this->productQueries = $productQueries;
    }
    /**
     * @return View
     * вывожу все продукты
     */
    public function index(Request $request): View
    {
        /** @var Product[] $products */


        $category_id = $request->query('category_id','all');
        $products = $this->productQueries->filterOfCategory($category_id);
        $categories = Category::all();
        return view('products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_name' => ['required', 'min:3'],
            'category_id' => ['required'],
        ]);
        Product::create([
            'name' => $validated['product_name'],
            'category_id' => $validated['category_id'],
        ]);
        return redirect()->route('products.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function edit(int $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);

    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'product_name' => ['required', 'min:3'],
            'category_id' => ['required']
        ]);
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $validated['product_name'],
            'category_id' => $validated['category_id'],
        ]);
        return redirect()->route('products.index');
    }
}
