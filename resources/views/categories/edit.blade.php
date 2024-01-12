@extends('layouts.app')

@section('title', 'Les catégories')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Editer une catégorie</h3>
                            
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
                            <form method="POST" action="{{ route('categories.update', $category) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="category_name">Nom</label>
                                    <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="category_description">Description</label>
                                    <input type="text" name="category_description" class="form-control"
                                        value="{{ $category->category_description }}" id="category_description">
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
