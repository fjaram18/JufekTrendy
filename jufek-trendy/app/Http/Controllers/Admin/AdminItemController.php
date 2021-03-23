<?php
//Autor: Juan Camilo Echeverri
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminItemController extends Controller
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
            ["route" => "item.create", "tittle" => __('messages.create_item')],
            ["route" => "item.list", "tittle" => __('messages.list_items')],
        ];

        return view('admin.admin_menu')->with("data", $data);
    }

    public function create()
    {
        return view('admin.item.create');
    }

    public function list() 
    {
        $data = []; //to be sent to the view
        $data["items"] = Item::all()->sortBy('id');
        return view('admin.item.list')->with("data", $data);
    }

    public function show($id)
    {
        try {

            $data = []; //to be sent to the view
            $item = Item::findOrFail($id);
            $data["item"] = $item;
    
            return view('admin.item.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');

        }


    }

    public function save(Request $request)
    {
        Item::validate($request);
        Item::create($request->only(["amount","subtotal"]));

        return back()->with('success', 'Item successfully created');

    }

    public function delete($id)
    {

        $item = Item::find($id);
        $item->delete();

        return redirect()->route('admin.item.list')->with('eliminate', 'Item successfully deleted');
    }
}
