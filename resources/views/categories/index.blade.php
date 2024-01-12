@extends('layouts/app')

@section('content')
    <div class="container py-5">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-10 mx-auto">
                    <div class="bg-white rounded-lg shadow-sm p-5">
                        <div class="tab-content">
                            <div id="nav-tab-card" class="tab-pane fade show active">
                                <h3>Liste des catégories</h3>
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
                                            <th scope="col">Nom</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_description }}</td>
                                            <td>
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-primary btn-sm">Editer</a>
                                                <a href="{{ route('categories.destroy', $category->id) }}"
                                                    class=" btn btn-danger btn-sm">Supprimer</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Fin du Tableau -->
                                <h3> Ajouter un produit</h3>
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
