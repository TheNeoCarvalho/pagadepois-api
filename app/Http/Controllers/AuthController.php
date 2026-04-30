<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {

    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $userExist = User::where('email', $validated['email'])->first();

        if($userExist){
            return response()->json([
                'message' => 'O email já está cadastrado, use outro email!'
            ], 400);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        
        $token = $user->createToken('auth_token')->plainTextToken();
        
        return response()->json([
            'message' => 'Usuário criado com sucesso!',
            'access_token' => $token,
            'token_type' => 'Bearer'
            ], 201);
            
    }

    /**
     * Logout the authenticated user.
     */
    public function logout(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}