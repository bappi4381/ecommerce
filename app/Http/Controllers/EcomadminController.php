<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use Illuminate\Http\Request;


class EcomadminController extends Controller
{
    
    public function deshboard()
    {
        return view('admin.admin');
    }
    public function catagory_add()
    {
        return view('admin.catagory.catagoryadd');
    }

    public function catagory_create(Request $request)
    {
        $catagory = new Catagory();
        $catagory->catagory_name = $request->catagory_name;
        $catagory->save();
        $request->session()->flash('status','Catagory add successfully');
        return redirect('/deshboard/catagory/add');
    }
    public function catagory_show()
    {
        $this->catagory= Catagory::all();
        return view('admin.catagory.catagoryshow',['catagorys'=>$this->catagory]);
    }
    public function catagory_edit($id){
        $catagory = Catagory::find($id);
        return view ('admin.catagory.catagoryedit',compact('catagory'));
    }
    public function catagory_update(Request $request,$id){
        $catagory = Catagory::find($id);
        $catagory->catagory_name = $request->catagory_name;
        $catagory->save();
        return redirect('/dashboard/catagory/show');
    }
    public static function catagory_delete($id)
    {
        $catagory = Catagory::find($id);
        $catagory->delete();
        return redirect('/dashboard/catagory/show');
    }

   
}
