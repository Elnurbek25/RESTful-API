<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->get(); 
        return response()->json([
            'data' => $users,
        ],200);
    }
    public function store(StoreUserRequest $request)
    {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return response()->json([
        'status' => 201,
        'data' => $user,
    ], 201);
    }
public function show(User $user)
    {
    return response()->json([
        'data' => $user->load('posts'),
    ],200);
    }
public function update(UpdateUserRequest $request, User $user)
    {
    $user->update($request->validated());
    return response()->json([
        'data' => $user,
    ],200);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
        ],200);
    }
}
