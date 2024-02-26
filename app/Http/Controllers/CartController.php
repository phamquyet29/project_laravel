<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Products::findOrFail($productId);
        $size = $request->input('size'); // Assume size is passed in the request

        if ($product->sizes()->where('size', $size)->exists()) {
            $cart = $request->session()->get('cart', []);
            $cart[$productId][$size] = isset($cart[$productId][$size]) ? $cart[$productId][$size] + 1 : 1;
            $request->session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart.');
        } else {
            return redirect()->back()->with('error', 'Selected size is not available for this product.');
        }
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
    public function removeItem($id)
    {
        $cart = Session::get('cart', []);
        // dd($id);
        // $rowId = $request->rowId;
        // Cart::instance('cart')->remove($rowId);
        if (!empty($cart)) {
            unset($cart[$id]);

            // Cập nhật giỏ hàng trong session
            session(['cart' => $cart]);

            return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        } else {
            // Nếu không tìm thấy sản phẩm trong giỏ hàng, có thể xử lý theo ý bạn
            // Ví dụ: return redirect()->route('cart.show')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
            // hoặc có thể ném ra một exception
            // return redirect()->back()->with('success', 'đang k có');
            return redirect()->route('cart.show')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }
    }
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Book added to cart.');
        }
    }

    public function send_cart(Request $request)
    {
        // Lấy thông tin giỏ hàng từ session hoặc cơ sở dữ liệu
        $cart = session()->get('cart');

        // Kiểm tra xem giỏ hàng có sản phẩm không
        if (!empty($cart)) {
            // Gửi email với thông tin đơn hàng
            Mail::to('cuytsgoodboy@gmail.com')->send(new TestMail($cart));

            // Xóa giỏ hàng sau khi gửi email thành công hoặc có thể xử lý theo logic của bạn
            session()->forget('cart');

            return redirect()->route('cart.show')->with('success', 'Đã gửi email xác nhận đơn hàng.');
        } else {
            return redirect()->route('cart.show')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
    }
}
