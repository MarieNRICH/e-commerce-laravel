@extends('layouts.app')

@section('title', 'Les catégories')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Editer un produit</h3>
                            
                            <!-- Message d'information -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Formulaire -->
                            <form method="POST" action="{{ route('products.update', $product) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="category_id">Catégorie</label>
                                    <input type="text" name="category_id" class="form-control"
                                        value="{{ $product->category_id }}" id="category_id" required>
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Nom du produit</label>
                                    <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ $product->description }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Prix</label>
                                    <input type="text" name="price" class="form-control"
                                        value="{{ $product->price }}" id="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" class="form-control"
                                        value="{{ $product->stock }}" id="stock" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="text" name="product_image" class="form-control"
                                        value="{{ $product->image }}" id="image">
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Mettre à jour</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
