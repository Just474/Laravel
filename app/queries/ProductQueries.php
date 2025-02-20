<?php

namespace App\queries;

use App\Models\Product;
use Illuminate\View\View;

class ProductQueries
{
    public function filterOfCategory($category_id)
    {
        if ($category_id === 'all') {
           return Product::all();
        } else {
            return Product::where('category_id', $category_id)
                ->get();
        }
    }
}
