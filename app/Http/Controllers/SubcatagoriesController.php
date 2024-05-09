<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\SubCatagory;
use Illuminate\Http\Request;

class SubcatagoriesController extends Controller
{
    public function index(){
        $this->catagories = Catagory::orderBy('catagory_name','ASC')->get();
        return view('admin.subcatagory.subcatagoriadd',['catagories'=>$this->catagories]);
    }
    
    public function subcatagory_create(Request $request)
    {
      
        $catagories = new SubCatagory();
        $catagories->catagory_id = $request->catagory_id;
        $catagories->subcatagory_name = $request->subcatagory_name;
        $catagories->save();
        $request->session()->flash('status','SubCatagory add successfully');
        return redirect('/deshboard/Subcatagory/add');
    }
    public function subcatagory_show()
    {
        
        $this->catagories= SubCatagory::all();
        return view('admin.subcatagory.subcatagorishow',['catagories'=>$this->catagories]);
    }
    
}
