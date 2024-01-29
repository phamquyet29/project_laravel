<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
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
    public function destroy(Products $product)
    {
        // Lấy thông tin giỏ hàng từ session
        $cart = session('cart', []);
    
        // Tìm vị trí của sản phẩm trong giỏ hàng
        $productIndex = array_search($product->id, array_column($cart, 'product_id'));
    
        // Nếu sản phẩm tồn tại trong giỏ hàng, xóa nó
        if ($productIndex !== false) {
            unset($cart[$productIndex]);
    
            // Cập nhật giỏ hàng trong session
            session(['cart' => array_values($cart)]);
            
            // Redirect về trang giỏ hàng với thông báo thành công
            return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        } else {
            // Nếu không tìm thấy sản phẩm trong giỏ hàng, có thể xử lý theo ý bạn
            // Ví dụ: return redirect()->route('cart.show')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
            // hoặc có thể ném ra một exception
        }
    }
    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }
}
