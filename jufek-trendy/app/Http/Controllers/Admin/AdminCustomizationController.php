<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customization;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminCustomizationController extends Controller
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
            ["route" => "admin.customization.create", "tittle" => __('messages.create_customizations')],
            ["route" => "admin.customization.list", "tittle" => __('messages.list_customizations')],
        ];

        $data["title"] = __('messages.menu_customizations');

        return view('admin.admin_menu')->with("data", $data);
    }
    
    public function show($id)
    {
        try {

            $data = []; //to be sent to the view
            $customization = Customization::findOrFail($id); //Customization to be shown
            $data["title"] = $customization->getName();
            $data["customization"] = $customization;
            
            return view('admin.customization.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');
            
        }
    }


    public function create()
    {
        $data = []; //to be sent to the view
        $data["products"] = Product::all();

        return view('admin.customization.create')->with("data", $data);
    }


    public function save(Request $request)
    {
        Customization::validate($request);
        $customization = new Customization();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $nameImage = time().$image->getClientOriginalName();
            $image->move(public_path().'/img/customization',$nameImage);
        };

        $customization->setName($request->input('name'));
        $customization->setSize($request->input('size'));
        $customization->setLocation($request->input('location'));
        $customization->setPrice($request->input('price'));
        $customization->setImage($nameImage);
        $customization->setProductId($request->input('product_id'));
        $customization->save();
        //Customization::create($request->only(["name", "size", "location", "price", "product_id"]));

        return back()->with('success', __('messages.customization_succes'));
    }


    public function delete($id) 
    {
        
        Customization::destroy($id);
        return redirect()->route('admin.customization.list')->with('eliminate', __('messages.customization_delete'));
       
    }


    public function list() 
    {
        $data = []; //to be sent to the view
        $data["title"] = "List of Customizations";
        $customizations = Customization::all();
        $data["customizations"] = $customizations;

        return view('admin.customization.list')->with("data", $data);
    }
}
