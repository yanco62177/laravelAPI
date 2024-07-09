<?php

namespace App\Http\Controllers;

use App\Models\UserList; // Ensure the correct model is imported
use Illuminate\Http\Request;

class UserListsController extends Controller
{
    public function allUsers()
    {
        $myUsers = UserList::all();

        if ($myUsers->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No users found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $myUsers
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:225',
        ]);
    
        $username = $request->input('username');
        $password = $request->input('password');
    
        $user = UserList::where('username', $username)->first();
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'No items found for this user'
            ], 404);
        }
    
        if ($user->password !== $password) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password'
            ], 401);
        }
    
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
    
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
        
        $user = UserList::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
    
}
