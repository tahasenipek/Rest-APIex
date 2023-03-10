<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolist = Todolist::all();
        return $todolist;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todolist = new Todolist();
        $todolist->content = $request->content;

        $todolist->save();
        return response()->json('message' == 'Stored Succesfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todolist = Todolist::find($id);
        return $todolist;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todolist = Todolist::findOrFail($request->id);
        $todolist->content = $request->content;
        $todolist->save();
        return $todolist;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todolist = Todolist::destroy($id);
        return response()->json('message' == 'Deleted Succesfuly');
    }
    public function uindex(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }
}

/*  $credentials = [ 
     'email' => 'admin@admin.com',
     'password' => 'password'
 ];

 if (!Auth::attempt($credentials))
 {
     $user = new \App\Models\User();

     $user->name = 'Admin';
     $user->email = $credentials['email'];
     $user->password = Hash::make($credentials['password']);
     $user->save();
     if (!$user)
     {
         return response([
             'message' => ['These credentials dasdo not match our records.']
         ], 404);
     }
     if (!$user || !Hash::check($request->password, $user->password)) {
             return response([
                 'message' => ['These credentials do not match our records.']
             ], 404);
         }
     
          $token = $user->createToken('my-app-token')->plainTextToken;
     
         $response = [
             'user' => $user,
             'token' => $token
         ];
          return [
             $user,
             $token,
          ];
 }
  */