@extends('layouts.app')
@section('title', 'Ajouter Categorie')
@section('content')
<div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('categories') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Edit Categorie</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('categories.update',$categorie->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Libele</label>
                                <input value="{{ old('libele_categorie',$categorie->libele_categorie) }}" type="text" class="@error('libele_categorie') is-invalid @enderror form-control-lg form-control" placeholder="Libele" name="libele_categorie">
                                @error('libele_categorie')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Mettre à Jour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection