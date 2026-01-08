<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $rows = Menu::all();
        return view('menus.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $roles = Role::all();   // 👈 REQUIRED
        return view('menus.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_title' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $data = $request->only(['sub_title', 'title', 'description']);
        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Menu::findOrFail($id);
        return view('menus.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sub_title' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $data = $request->only(['sub_title', 'title', 'description']);
        $menu = Menu::findOrFail($id);
        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
