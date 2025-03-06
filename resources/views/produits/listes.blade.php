@extends('layouts.app')
@section('title', 'Produits')
@section('content')

<div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <form method="GET" action="/products/search">
                    <div class="input-group" style="margin-right:5px;">
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control" name="search" placeholder="Searh..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
                <a href="" class="btn btn-primary">Create</a>
            </div>
            <div class="col-md-10">
                <div class="card borde-0  my-4">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Liste des produits</h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Libele</th>
                                <th>Prix Unitaire</th>
                                <th>Stock</th>
                                <th>Categorie</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>

                        </table>
</div>
@endsection