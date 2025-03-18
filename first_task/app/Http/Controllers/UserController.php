<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Project; 

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('project'); // Eager load project relationship

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('sort_by') && $request->sort_by) {
            $sortOrder = $request->get('sort_order', 'asc');
            $query->orderBy($request->sort_by, $sortOrder);
        }

        $users = $query->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('users.create', compact('projects'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'project_id' => $request->project_id, // Assign project ID
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $projects = Project::all(); 
        return view('users.edit', compact('user', 'projects'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'project_id' => $request->project_id, // Update project ID
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
