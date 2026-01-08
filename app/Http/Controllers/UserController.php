<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = User::with('role')->get();
        return view('users.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'role_id' => 'required|exists:roles,id',
        'phone' => 'required|min:3|max:15',
        'address' => 'required|min:3|max:255',
        'description' => 'nullable',
        'profile' => 'nullable|image|max:2048',

    ]);

    $data = $request->only([
        'name','email','role_id','phone','address','description'
    ]);

    if ($request->hasFile('profile')) {
       $profile = $request->file('profile');
       $profileName = time().'_'.$profile->getClientOriginalName();
       $profile->move(public_path('images/profiles'), $profileName);
       $data['profile'] = 'images/profiles/'.$profileName;
 
    }

    $data['password'] = bcrypt($request->password);
    $data['description'] = $request->description;

    User::create($data);
    return redirect()->route('user.index')->with('success','User created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $user = User::findOrFail($id);
       return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $row = User::findOrFail($id);
    return view('users.edit', compact('row')); // folder 'users', not 'user'
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $row = User::findOrFail($id);

    $request->validate([
        'name' => 'required|min:3|max:255|unique:users,name,' . $id,
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'nullable|min:3|max:15',
        'address' => 'nullable|min:3|max:255',
        'description' => 'nullable',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only([
        'name','email','role_id','phone','address','description'
    ]);

    if ($request->hasFile('profile')) {
        if ($row->profile && file_exists(public_path($row->profile))) {
            unlink(public_path($row->profile));
        }

        $file = $request->file('profile');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('images/profiles'), $filename);
        $data['profile'] = 'images/profiles/'.$filename;
    }

    $row->update($data);

    return redirect()->route('user.index')->with('success','User updated successfully!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = User::findOrFail($id);

        if ($row->profile && file_exists(public_path($row->profile))) {
            unlink(public_path($row->profile));
        }

        $row->delete();

        return redirect()->route('user.index')->with('success','User deleted successfully!');
    }
}
