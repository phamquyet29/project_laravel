<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductUseController extends Controller
{
    public function index()
{
    $products = Products::all(); // Lấy danh sách sản phẩm từ database
    return view('welcome', compact('products'));
}

}
