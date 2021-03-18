<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $user = User::create(
            [
                "name" => $request->input("name"),
                "username" => $request->input("username"),
                "phone" => $request->input("phone"),
                "address" => $request->input("address"),
                "role" => $request->input("role"),
                "password" => \Hash::make($request->input("password"))
            ]
        );
        return redirect()->route('users.index')->with('status', 'Data user berhasil disimpan');
    }

    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $user = User::findOrFail($id);
        if ($request->input("password") == "") {
            $user->update(
                [
                    "name" => $request->input("name"),
                    "username" => $request->input("username"),
                    "phone" => $request->input("phone"),
                    "address" => $request->input("address"),
                    "role" => $request->input("role"),
                ]
            );
        } else {
            $user->update(
                [
                    "name" => $request->input("name"),
                    "username" => $request->input("username"),
                    "phone" => $request->input("phone"),
                    "address" => $request->input("address"),
                    "role" => $request->input("role"),
                    "password" => \Hash::make($request->input("password"))
                ]
            );
        }
        return redirect()->route('users.index')->with('status', 'Data user berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Data user berhasil dihapus');
    }
}
