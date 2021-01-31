<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(8);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
            'image' => $request->image,
            'slug' => Str::slug($request->name, '-'),
        ]);

        Session::flash('success', 'User created successfully');
        return redirect()->back();

    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
        ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->description = $request->description;
            // $user->image = $request->image;
            $user->slug = Str::slug($request->name, '-');

            if ($request->hasFile('image')) {
                $image = $request->image;
                unlink(public_path($user->image));
                $image_new_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/profile/', $image_new_name);
                $user->image = '/storage/profile/' . $image_new_name;
                
            }

            $user->save();

        Session::flash('success', 'User updated successfully');
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            Session::flash('success', 'User deleted successfully');
        }
        return redirect()->back();
    }

}
