<?php
//Autor: Juan Camilo Echeverri
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="user"){
                return redirect()->route('home.index');
            }

            return $next($request);

        });
    }

    public function menu()
    {
        $data = []; // to be sent to the view
        $data["routes"] = [
            ["route" => "product.create", "tittle" => __('messages.create_products')],
            ["route" => "product.list", "tittle" => __('messages.list_products')],
        ];

        return view('admin.admin_menu')->with("data", $data);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function list() 
    {
        $data = []; //to be sent to the view
        $data["products"] = Product::all()->sortBy('id');
        return view('admin.product.list')->with("data", $data);
    }

    public function show($id)
    {
        try {

            $data = []; //to be sent to the view
            $product = Product::findOrFail($id);
            $data["product"] = $product;
    
            return view('admin.product.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');

        }


    }

    public function save(Request $request)
    {
        Product::validate($request);
        Product::create($request->only(["name", "size", "stock", "price", "image", "description"]));

        return back()->with('success', 'Elemento creado satisfactoriamente');

    }

    public function delete($id)
    {

        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.product.list')->with('eliminate', 'Producto eliminado');
    }
}
