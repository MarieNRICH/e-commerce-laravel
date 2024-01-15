@extends('layouts.app')

@section('title')
    Lite des produicts
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Ajouter un produit</h3>
                            <!-- Formulaire -->
                            <form method="POST" action="{{route('products.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id"> 
                                        <option value="">--Choisissez la Catégorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="product_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Prix</span></label>
                                            <div class="input-group">
                                                <input type="number" name="price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label>Stock</label>
                                            <input type="number" name="stock" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="text" name="product_image" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                                    Ajouter un produit </button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
