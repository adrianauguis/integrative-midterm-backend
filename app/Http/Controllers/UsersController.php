<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::all();

        return response([
            'message' => "Users retrieved",
            'user' => $user
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request -> validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);


        $post = Users::create([
            'email' => $attrs['email'],
            'password' => $attrs['password'],
            'role' => $attrs['role'],
            'status' => $attrs['status'],
        ]);

        return response([
            'message' => "Post created",
            'user' => $post
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        return response([
            'message' => 'Post Found',
            'user' => Users::where('id', $id)->get()
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $attrs = $request -> validate([
            'email' => 'nullable|string',
            'password' => 'nullable|string',
            'role' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $postshow = Users::find($id);
        if($postshow){
            $postshow->update($attrs);

            return response()-> json([
                'message' => 'Post Updated',
                'user' => $postshow,
            ], 200);
        }else{
            return response()->json([
                'message' => 'Post Not Found',
                'user' => null
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id)
    {
        $postdel = Users::find($id);

        if($postdel){
            $postdel->delete();

            return response()-> json([
                'message' => 'Post Deleted',
                'user' => null
            ], 200);
        }else{
            return response()->json([
                'message' => 'Post Not Found',
                'user' => null
            ], 404);
        }
    }
}
