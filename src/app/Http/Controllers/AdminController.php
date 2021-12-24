<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function show()
    {
        $users = User::all();

        return view('management.admin')
            ->with(['users' => $users]);
    }

    public function destroy(Request $request)
    {
        $user = $request->only(['id']);

        User::destroyUser($user);

        return redirect('admin');
    }
}
