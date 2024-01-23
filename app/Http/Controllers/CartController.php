<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Logic thêm sản phẩm vào giỏ hàng ở đây
        // Ví dụ: tăng số lượng sản phẩm trong session

        $cart = $request->session()->get('cart', []);
        $cart[$productId] = isset($cart[$productId]) ? $cart[$productId] + 1 : 1;
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }
}
