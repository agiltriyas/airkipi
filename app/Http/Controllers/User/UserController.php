<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('user.user.edit', compact('user'));
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
        return to_route('user.home');
    }
}
