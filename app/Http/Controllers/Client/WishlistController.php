<?php

namespace App\Http\Controllers\Client;
use App\Models\Product;
use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{ 
    private $result;
    public function index ()
    {
        // $productIDwishlist = auth()->user()->wishlist->pluck('product_id'); 
        $userID = Auth::user()->id;
        $wishlistProductID = Wishlist :: where ('user_id',$userID)->pluck('product_id');
        
        $wishlist = Product::whereIn('id', $wishlistProductID)->get();
        $this->result['wishlist'] = $wishlist;
        return view('client.pages.wishlist.index', ['data' => $this->result]);
    }
    
    public function create ($id)
    { 
        $userID = Auth::user()->id;
        $existProduct = Wishlist::where('user_id', $userID)->where('product_id', $id)->first();
            if (!$existProduct) {
                Wishlist::create([
                    'user_id' => $userID,
                    'product_id' => $id,
                ]);
    
                return response()->json(['message' => 'Thêm sản phẩm vào danh sách yêu thích thành công']);
            }
    
            return response()->json(['message' => 'Sản phẩm đã tồn tại trong danh sách yêu thích']);
        
    }
    
}


