<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adminAll()
    {
        return view('admin/user/users', [
            "users" => User::all(),
            "roles" => Role::all()
        ]);
    }

    public function createAdmin()
    {
        return view('admin/user/create', [
            "roles" => Role::all()
        ]);
    }

    public function storeAdmin(Request $request)
    {
        if (empty($request->name) || empty($request->email) || empty($request->role) || empty($request->password)) {
            return redirect()->back()->with("error", "All fields are required!");
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route("user.admin.all")->with("success", "User created successfully!");
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/user/edit', [
            "user" => $user,
            "roles" => Role::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        if (empty($request->name) || empty($request->email) || empty($request->role)) {
            return redirect()->back()->with("error", "All fields are required!");
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('role')) {
            $user->role_id = $request->role;
        }
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route("user.admin.all")->with("success", "User updated successfully!");
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("user.admin.all")->with("success", "User deleted successfully!");
    }
}
