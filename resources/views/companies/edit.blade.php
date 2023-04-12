@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="modal-title">Modifier une entreprise</h4>
                <form action="{{ route('companies.update', ['company' => $company->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('companies.form')
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
