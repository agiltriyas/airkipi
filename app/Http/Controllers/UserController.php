<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $image = $request->file('image')->storeAs(
            'image/profile/',
            $request->email . '-thumb.' . $request->image->getClientOriginalExtension(),
            'public'
        );
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'lastname' => $request->lastname,
            'password' => Hash::make($request->password),
            'image' => $image,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);

        $user->assignRole('admin');

        toast('New user has been created', 'success');
        return to_route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->file('imageavatar') !== null) {
            $imageavatar = $request->file('imageavatar')->storeAs(
                'image/landingpage',
                'logo-sejarahlokalsumut.' . $request->imageavatar->getClientOriginalExtension(),
                'public'
            );
            $request['image'] = $imageavatar;
        }
        $user = User::findOrFail($id);
        $user->update($request->except('password', 'password_confirmation', 'imageavatar'));

        toast('New user has been updated', 'success');
        return to_route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        toast('New user has been deleted', 'success');
        return to_route('admin.user.index');
    }
}
