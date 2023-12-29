<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->isAdmin = 1;
            $user->save();
        }
        return redirect()->route('admin.index');
    }

    public function removeAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->isAdmin = 0;
            $user->save();
        }
        return redirect()->route('admin.index');
    }

    public function suspendUser($userId)
    {
        $user = User::findOrFail($userId);

        // Toggle the suspension status
        $user->update(['is_suspended' => !$user->is_suspended]);

        return redirect()->route('user.index')->with('success', 'User suspended/un-suspended successfully.');
    }
}
