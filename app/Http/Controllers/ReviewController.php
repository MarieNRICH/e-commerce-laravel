<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Reviews::all();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        // $reviews = Reviews::all();
        return view('reviews.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'product_id' => 'required|max:50',
            'comment' => 'required|max:255',
            'rating' => 'required|max:255',
        ]);
        // dd('toto');
        // dd($user->id);
        Reviews::create([
            'user_id'=>$user->id,
            'product_id'=>$request->input('product_id'),
            'comment'=>$request->input('comment'),
            'rating'=>$request->input('rating'),
        ]);

        return redirect()->route('reviews.index')
            ->with('success', 'commentaire ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviews $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviews $review)
    {
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reviews $review)
    {
        $request->validate([
            // 'product_id' => 'required|max:50',
            // 'user_id' => 'required|max:50',
            'comment' => 'required|max:255',
            'rating' => 'required|max:2',
        ]);
        // dd($request);
        $review->update($request->all());

        return redirect()->route('reviews.index')
            ->with('success', 'commentaire a bien été mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($reviews);
        $review = Reviews::find($id);
        $review->delete();
            return redirect()->route('reviews.index')->with('message', 'Le commentaire a bien été supprimé');
    }
}
