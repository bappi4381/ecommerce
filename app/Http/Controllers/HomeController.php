<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('ecommerce.layout.home');
    }
    public function shop(){
        return view('ecommerce.layout.shope');
    }
    public function contact(){
        return view('ecommerce.layout.contact');
    }

}
