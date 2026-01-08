<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
{
    $setting = Setting::firstOrFail();
    return view('settings.edit', compact('setting'));
}

public function update(Request $request, string $id)
{
    $row = Setting::findOrFail($id);

    $request->validate([
        'title' => 'required|unique:settings,title,' . $row->id,
            'email' => 'required|email',
            'phone' => 'required',
            'telegram' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'description' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'email', 'phone', 'telegram', 'facebook', 'instagram', 'youtube', 'description']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/settings'), $filename);
            $data['logo'] = 'images/settings/' . $filename;
        }

        $row->update($data);

        return redirect()
            ->route('settings.edit')
            ->with('success', 'Setting updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
