@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="modal-title">Ajouter nouvelle entreprise</h4>
                <form action="{{ route('companies.store') }}" method="POST">
                    @csrf
                    @include('companies.form')
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
