<?php
//Autor: Juan Camilo Echeverri
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
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
            ["route" => "admin.product.create", "tittle" => __('messages.create_products')],
            ["route" => "admin.product.list", "tittle" => __('messages.list_products')],
        ];

        $data["title"] = __('messages.menu_products');

        return view('admin.admin_menu')->with("data", $data);
    }

    public function create()
    {
        $data = [];
        $data["categories"] = Category::all();

        return view('admin.product.create')->with("data", $data);
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
        $product = new Product();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $nameImage = time().$image->getClientOriginalName();
            $image->move(public_path().'/img/product',$nameImage);
        };

        $product->setName($request->input('name'));
        $product->setSize($request->input('size'));
        $product->setStock($request->input('stock'));
        $product->setPrice($request->input('price'));
        $product->setImage($nameImage);
        $product->setDescription($request->input('description'));
        $product->setCategoryId($request->input('category_id'));
        $product->save();
        //Product::create($request->only(["name", "size", "stock", "price", "image", "description", "category_id"]));

        return back()->with('success', __('messages.product_succes'));

    }

    public function delete($id)
    {

        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.product.list')->with('eliminate', __('messages.product_delete'));
    }
}
