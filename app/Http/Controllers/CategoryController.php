<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    /**
     * @return View
     * вывожу все продукты
     */
    public function index():View
    {
        /** @var Category[] $categories */
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('categories.create', ['categories' => $categories]);
    }

    public function store(Request $request):RedirectResponse
    {
       $validated = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
        ]);
        Category::create([
            'name' => $validated['category_name'],
        ]);

        return redirect('/categories');
    }

    public function destroy(int $id):RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories');
    }

    public function edit(int $id):View
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, int $id):RedirectResponse
    {
        $validated = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
        ]);
        $category = Category::findOrFail($id);
        $category -> update([
            'name' => $validated['category_name'],
        ]);
        return redirect('/categories');
    }
}
