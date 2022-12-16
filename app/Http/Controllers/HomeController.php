<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders= Banner::where('type','=','slider')->where('is_active','=',1)->orderBy('priority')->get();

        $indexTopBanners=Banner::where('type','=','index-top')->where('is_active',1)->orderBy('priority')->get();

        $indexBottomBanners=Banner::where('type','=','index-bottom')->where('is_active',1)->orderBy('priority')->get();

        $products=Product::where('is_active',1)->get()->take(5);

        return view('home/index' , compact('sliders','indexTopBanners','indexBottomBanners','products'));
    }

}
