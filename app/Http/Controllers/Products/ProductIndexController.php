<?php

namespace App\Http\Controllers\Products;

use App\Domain\Product\Product;
use Illuminate\Http\Request;

class ProductIndexController
{
    public function __invoke(Request $request)
    {
        $products = Product::paginate();

        return view('products.index', ['products' => $products]);
    }

    public function search(Request $request)
    {
        if(($request->input('category') != 0) && $request->has('cities'))
        {
            $products = Product::query()
                ->where('category', $request->input('category'))
                ->WhereIn('city', $request->input('cities'))
                ->paginate();

        }
        elseif(($request->input('category') == 0) && $request->has('cities'))
        {
            $products = Product::query()
                ->WhereIn('city', $request->input('cities'))
                ->paginate();
        }
        elseif(($request->input('category') != 0) && !$request->has('cities')){

            $products = Product::query()
                ->where('category', $request->input('category'))
                ->paginate();
        }
        else
        {
            $products = Product::paginate();
        }

        return view('products.index', ['products' => $products]);
    }
}
