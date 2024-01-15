<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:50',
            'category_description' => 'required|max:255',
        ]);
        // dd($request);
        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categorie ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // $category = Category::find($category);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|max:40',
            'category_description' => 'nullable|string'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('message', 'La catégorie a bien été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd("toto");
            $category->delete();
            return redirect()->route('categories.index')->with('message', 'La catégorie a bien été supprimé');

    }
}
