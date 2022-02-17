<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $user = User::get();
        return response()->json($user, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->id = $request->get('id');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->pass = $request->get('email');
        $user->email_verified_at = $request->get('email_verified_at');
        $user->img = $request->get('img');
        $user->ubicacion = $request->get('ubicacion');
        $user->save();
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user, 200);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->email_verified_at = $request->get('email_verified_at');
        $user->img = $request->get('img');
        $user->ubicacion = $request->get('ubicacion');
        $user->save();
        return response()->json($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json($user, 204);
    }
}
