<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\SubCatagory;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $this->catagories= SubCatagory::all();
        return view('admin.product.addproduct',['catagories'=>$this->catagories]);
    }
    public function productcreate(Request $request){

        $validator = Validator::make($request->all(), [
            'product_title' => 'required',
            'price' => 'required|numeric',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product        = $request->file('image');
        $extention      = $product ->getClientOriginalName();
        $imageName      = 'product_'.time().'.'.$extention;
        $product->storeAs('Public',$imageName);

        $product = new Product();
        $product->product_title      = $request->product_title;
        $product->price              = $request->price;
        $product->catagory_id        = $request->catagory_id;
        $product->sub_catagory_id    = $request->sub_catagory_id;
        $product->description        = $request->description;
        $product->image              = $imageName;
        $product->save();
        $request->session()->flash('status','Product add successfully');
        return redirect()->route('product_add');
    }
    public function showProduct()
    {
        $products = Product::all();
        $categories = Catagory::all();
        $subcategories = Subcatagory::all();
        return view('admin.product.showproduct', compact('categories', 'subcategories'))->with('products', $products);
    }
    public function search(Request $request) {
        
        
         $query = DB::table('Product')
        ->select('id','product_title', 'price');

        $totalData = $query->count();

        $start = $request->input('start');
        $length = $request->input('length');

        $query->skip($start)->take($length);
        $data = $query->get();

    return response()->json([
        'draw' => $request->input('draw'),
        'recordsTotal' => $totalData,
        'recordsFiltered' => $totalData,
        'data' => $data
    ]);
    return view('admin.product.showproduct');
   }
}
