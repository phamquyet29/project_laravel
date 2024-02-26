<?php

namespace App\Http\Controllers;

use App\Models\Accout;
use Illuminate\Http\Request;

class AccoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Accout::all();
        return view('accout.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accout.create'); // Tạo view để hiển thị form thêm mới
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate request
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
            'role' => 'required|numeric',
        ]);

        // Create user
        Accout::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('accout.index')->with('success', 'Thêm người dùng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Accout::find($id);
        return view('accout.show', compact('user')); // Sửa thành 'user'
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Accout $user)
    {
        return view('accout.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accout $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6',
            'role' => 'required|numeric',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);
        if ($request->filled('password')) {
            $user->update([
                'password' => $request->input('password'),
            ]);
        }

        return redirect()->route('accout.index')->with('success', 'Cập nhật người dùng thành công');
    }



    /**
     * Remove the specified resource from storage.
     *
     *@param  \App\Models\Accout  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accout $user)
    {
        $user->delete();

        return redirect()->route('accout.index')->with('success', 'Xoá người dùng thành công');
    }
}
