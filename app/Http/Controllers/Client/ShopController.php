<?php

namespace App\Http\Controllers\Client;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Auth;
// use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    private $result;

    public function __construct()
    {

        // $a = Auth::user();
        // dd($a);
        $categories = Category::all();
        $this->result['categories'] = $categories;
        return ['data' => $this->result];
    }
    public function show ($slug = null)
    { 
        if(!empty($slug)){
            $idCate =  Category::where('slug', 'like', '%'.$slug.'%')
            ->pluck('id');
            $products = Product::where('category', $idCate)->simplePaginate(9);
            // dd($products);
        }else{
            $products = Product::all();
        }
        $this->result['products'] = $products;
        return view('client.pages.shop.index', ['data' => $this->result]);
    }
    
}