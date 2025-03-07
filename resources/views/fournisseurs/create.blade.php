@extends('layouts.app')
@section('title', 'Ajouter Fournisseur')
@section('content')
<div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('fournisseurs') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Creer Un Fournisseur</h4>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('fournisseurs.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5"></label>
                                <input value="{{ old('laboratoire') }}" type="text" class="@error('laboratoire') is-invalid @enderror form-control-lg form-control" placeholder="laboratoire" name="laboratoire">
                                @error('laboratoire')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5"></label>
                                <input value="{{ old('description_lab') }}" type="text" class="@error('description_lab') is-invalid @enderror form-control-lg form-control" placeholder="description_lab" name="description_lab">
                                @error('description_lab')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5"></label>
                                <input value="{{ old('telephone') }}" type="text" class="@error('telephone') is-invalid @enderror form-control-lg form-control" placeholder="telephone" name="telephone">
                                @error('telephone')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            
                            
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection