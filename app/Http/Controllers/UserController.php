<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {

       $users = User::all();
       return view('admin.users.user',['users'=>$users]);

    }
    public function create()
    {
        return view('admin.users.create');

    }
    public function store(UserStoreRequest $request ,User $users)
    {
        $users->create($request->all());

        if ($request->hasFile('image')) {
            $users->clearMediaCollection('images');
            $users->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $users->save();
        return redirect()->route('users');

    }
    public function edit()
    {
        $users=User::all();

        return view('admin.users.create',['users'=>$users]);
    }
    public function update(UserStoreRequest $request , User $users)
    {
        $users->update($request->all());

        if ($request->hasFile('image')) {
            $users->clearMediaCollection('images');
            $users->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $users->save();
        return redirect()->route('users');
    }
    public function destroy(){

    }

    public function restoreUser($id)
    {
        // Find the soft-deleted user by its ID
        $user = User::onlyTrashed()->findOrFail($id);

        // Restore the soft-deleted user
        $user->restore();

        // Optionally, you can redirect the user back or return a response
        return redirect()->back()->with('success', 'User restored successfully');
    }

    public function Artiste()
    {
        $Artiste = User::all();
        return view('admin.ProfileArtiste.artiste',['Artiste'=>$Artiste]);

    }

}
