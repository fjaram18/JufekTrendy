<?php
//Autor: Katherin Valencia

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminCategoryController extends Controller
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
        $data = []; 
        $data["routes"] = [
            ["route" => "category.create", "tittle" => __('messages.create_category')],
            ["route" => "category.list", "tittle" => __('messages.list_categories')],
        ];

        return view('admin.admin_menu')->with("data", $data);
    }

    public function show($id)
    {
        try {

            $data = []; 
            $category = Category::findOrFail($id);
            $data["category"] = $category;
    
            return view('admin.category.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');

        }

    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function list()
    {
        $data = []; 
        $data["category"] = Category::all();

        return view('admin.category.list')->with("data",$data);
    }

    public function save(Request $request)
    {
        Category::validate($request);
        
        return back()->with('success', 'category successfully created');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.list')->with('success', 'category successfully deleted');
    }
}