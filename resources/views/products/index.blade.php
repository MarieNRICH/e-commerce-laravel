@extends('layouts/app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Liste des produits</h3>
                            @if (session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                            @endif

                            <!-- Tableau -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Type de Catégorie</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->id }}</th>
                                            <td>{{ $product->category_id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->product_image }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-primary btn-sm">Editer</a>
                                                <form method="post" action="{{ route('products.destroy', $product) }}"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                            <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                                Ajouter un produit
                            </a>
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

                            {{-- <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <h1>{{ $product->name }}</h1>
                                        <h3 class="text-success" >{{ $product->price }} $</h3>
                                        <div class="mb-3" >{!! nl2br($product->description) !!}</div>
                                        <div class="bg-white mt-3 p-3 border text-center" >	
                                            <p>Commander <strong>{{ $product->name }}</strong></p>
                                            <form method="POST" action="#" class="form-inline d-inline-block" >
                                                {{ csrf_field() }}
                                                <input type="number" name="quantity" placeholder="Quantité ?" class="form-control mr-2" >
                                                <button type="submit" class="btn btn-warning" >+ Ajouter au panier</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
