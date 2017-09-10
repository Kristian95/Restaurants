<?php

namespace App\Http\Controllers\Admin;

use App\User;
  
class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->get();

        return view('admin.users.index', compact('users'));
    }
    
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', trans('message.success.delete'));
    }
}
