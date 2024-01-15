@extends('layouts/app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Liste des commentaires</h3>
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
                                        <th scope="col">Produit</th>
                                        <th scope="col">Votre avis </th>
                                        <th scope="col">Notation</th>
                                        <th scope="col">Client</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <th scope="row">{{ $review->id }}</th>
                                            <td>{{ $review->product_id }}</td>
                                            <td>{{ $review->comment }}</td>
                                            <td>{{ $review->rating }}</td>
                                            <td>{{ $review->user_id }}</td>
                                            <td>
                                                <a href="{{ route('reviews.edit', $review->id) }}"
                                                    class="btn btn-primary btn-sm">Editer</a>
                                                <form method="post" action="{{ route('reviews.destroy', $review->id) }}"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn btn-danger btn-sm" value="supprimer">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                            <a href="{{ route('reviews.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                                Ajouter votre évaluation
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
