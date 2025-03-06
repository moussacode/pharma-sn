@extends('layouts.app')
@section('title', 'Categorie')
@section('content')

<div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
               
                <a href="" class="btn btn-primary">Create</a>
            </div>
            <div class="col-md-10">
                <div class="card borde-0  my-4">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Liste des categories</h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Libele Categorie</th>
                                
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>

                        </table>
</div>
@endsection