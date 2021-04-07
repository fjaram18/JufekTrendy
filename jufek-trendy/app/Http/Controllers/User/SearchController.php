<?php
//Author: Federico Jaramillo

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller

{
    public function index(Request $request)
    {
        $data = []; //to be sent to the view
        $products = Product::where([
            ['stock','>',0],
            [function($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy("id", "asc")
            ->simplePaginate(6);

        $data['products'] = $products;
        $data['title'] = "Search results";
        $data['term'] = $request->term;

        return view('search.index')->with("data", $data);
    }
}