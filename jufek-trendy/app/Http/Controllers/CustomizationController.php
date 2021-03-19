<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;
use Exception;

class CustomizationController extends Controller

{
    
    public function show($id)
    {
        try {

            $data = []; //to be sent to the view

            $customization = Customization::findOrFail($id); //Customization to be shown

            $data["title"] = $customization->getName();

            $data["customization"] = $customization;
            
            return view('customization.show')->with("data", $data);

        } catch (Exception $e){

            return redirect()->route('home.index');
            
        }
    }


    public function create()
    {
        $data = []; //to be sent to the view

        $data["title"] = "Create customization";

        return view('customization.create')->with("data", $data);
    }


    public function save(Request $request)
    {
        Customization::validate($request);

        Customization::create($request->only(["name", "size", "location", "price"]));

        return back();
    }


    public function delete($id) 
    {
        try {

            Customization::destroy($id);

            return redirect()->route('customization.list');

        } catch (Exception $e){

            return redirect()->route('home.index');
        }
    }


    public function list() 
    {
        $data = []; //to be sent to the view

        $data["title"] = "List of Customizations";

        $customizations = Customization::all();

        $data["customizations"] = $customizations;

        return view('customization.list')->with("data", $data);
    }
}
