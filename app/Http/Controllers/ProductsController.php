<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::with('category')->get();
        return view('index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => [
                'required',
                'numeric',
                Rule::exists('categories', 'id'),
            ],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $content = $request->file('image');
            $imageName = Storage::put('public/avatars', $content);

            $imageUrl = Storage::url($imageName);
            // dd($imageUrl);
        }
        Products::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'image' => $imageUrl,
        ]);
        return redirect()->route('products.index')->with('thongbao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $categories = Categories::all();
        return view('edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $categories = Categories::all();
        $product->update($request->all());
        return redirect()->route('products.index')->with('thongbao', 'Cập nhật thành công')->with('categories', $categories);;
    }
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('thongbao', 'Xoá thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Products $product)
    {
        // Lấy giỏ hàng từ session hoặc tạo mới nếu chưa tồn tại
        $cart = Session::get('cart', []);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($cart[$product->id])) {
            // Nếu có, tăng số lượng
            $cart[$product->id]['quantity']++;
        } else {
            // Nếu chưa, thêm sản phẩm mới vào giỏ hàng
            $cart[$product->id] = [
                'product' => $product,
                'quantity' => 1,
            ];
        }

        // Lưu giỏ hàng mới vào session
        Session::put('cart', $cart);

        // Redirect hoặc trả về response tùy thuộc vào yêu cầu của bạn
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Display the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        // dd(Session::get('cart'));
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart', []);

        // Kiểm tra nếu giỏ hàng không rỗng thì hiển thị view cart.show
        if (!empty($cart)) {
            return view('cartshow', compact('cart'));
        } else {
            // $cart=[];
            // return view('cartshow', compact('cart'));
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Products::where('name', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->get();

        return view('welcome', compact('products'));
    }
    public function updateQuantity(Products $product, $quantity)
{
    
    return response()->json(['totalPrice' => $product->price * $quantity]);
}
}
