<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
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
        $user = User::with(['profile', 'posts', 'posts.tags'])->get();
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }/* */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        //   $requestData = $request->validate([
        //       'name' => 'required|min:3',
        //       'email' => 'required|email|unique:users,email',
        //       'password' => 'required|min:6'
        //       'bio'=>'required|min:6',
        //       'avatar'=>'required'
        //   ]);
        $data = $request->validated();


        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $token = $user->createToken($request->name);

        //   return back()->with('success','register is successfuly');
        $profile = $user->profile()->create([
            'bio' => $request->bio,
            'avatar' => $request->avatar,
        ]);

        return [
            'user' => $user,
            'profile' => $profile,
            'token' => $token->plainTextToken
        ];
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'The provided credentials are incorrect.'
            ];
        }
        $token = $user->createToken($user->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }

    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
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
