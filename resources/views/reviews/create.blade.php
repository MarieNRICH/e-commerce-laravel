@extends('layouts.app')

@section('title')
    Lite des commentaires
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Ajouter un commentaire</h3>
                            <!-- Formulaire -->
                            <form method="POST" action="{{route('reviews.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Produit</label>
                                    <select name="product_id"> 
                                        <option value="">--Choisissez le produit</option>
                                        @foreach ($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Votre avis</label>
                                    <input type="text" name="comment" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Notation</span></label>
                                            <div class="input-group">
                                                <input type="number" name="rating" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                                    Valider </button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
