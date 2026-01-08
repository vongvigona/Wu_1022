<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $rows = Article::all();
        return view('articles.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::pluck('title', 'id');
        return view('articles.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required|string|max:255',
        'menu_id' => 'required|exists:menus,id',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $data = $request->only([
        'menu_id',
        'title',
        'sub_title',
        'content',
        'description',
    ]);

    // auto slug
    $data['slug'] = Str::slug($request->title) . '-' . time();

    // image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/articles'), $filename);
        $data['image'] = 'uploads/articles/'.$filename;
    }

    Article::create($data);

    return redirect()
        ->route('articles.index')
        ->with('success', 'Article created successfully.');
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
        $row = Article::findOrFail($id);
        $menus = Menu::pluck('title', 'id');
        return view('articles.edit', compact('row', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
  $row = Article::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'menu_id' => 'required',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $data = $request->only([
        'menu_id',
        'title',
        'sub_title',
        'content',
        'description',
    ]);

    // ✅ auto slug update
    $data['slug'] = Str::slug($request->title);

    // ✅ image upload
    if ($request->hasFile('image')) {

        if ($row->image && file_exists(public_path($row->image))) {
            unlink(public_path($row->image));
        }

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/articles'), $filename);

        $data['image'] = 'uploads/articles/' . $filename;
    }

    $row->update($data);

    return redirect()
        ->route('articles.index')
        ->with('success', 'Article updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Article::findOrFail($id);
        if ($row->image && file_exists($row->image)) {
            unlink($row->image);
        }
        $row->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
