<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfilesController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userList = User::all();
        return view('admin.profiles.index', [
            'users' => $userList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $user = new User($request->validated());
        if ($user->save()) {
            return redirect()->route('admin.profile.index')->with('success', __('User was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile)
    {
        return \view('admin.profiles.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $profile)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:150'],
            'email' => ['required', 'email'],
            'is_admin' => ['required', 'boolean'],
            'password' => ['required'],
            'newPassword' => ['required', 'min:8']
        ]);
        if (Auth::user()->id === $profile->id && $request->post('is_admin') === '0'){
            return back()->with('error', __('Can not change admin to non-admin'));
        }
        if(Hash::check($request->post('password'), $profile->password)){
            $profile->fill([
                'is_admin' => $request->post('is_admin'),
                'password' => Hash::make($request->post('newPassword'))
            ]);
            if ($profile->save()) {
                return redirect()->route('admin.profiles.index')->with('success', __('User was saved successfully'));
            }
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
