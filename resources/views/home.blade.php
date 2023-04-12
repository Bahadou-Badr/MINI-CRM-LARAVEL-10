@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (auth()->user()->is_admin)
                <div class="col-md-8 mb-4">
                    <form action="{{ route('search') }}" method="get" class="d-flex">
                        <div class="input-group">
                            <input class="form-control w-50 @error('search') is-invalid @enderror" type="search" name="search" placeholder="Rechercher"
                                aria-label="Search">
                            <select class="form-select" id="inputGroupSelect04" name="search_type" aria-label="search_type">
                                <option value="Enreprise">Enreprise</option>
                                <option value="Employe">Employe</option>
                            </select>
                            <button class="btn btn-dark" type="submit">Chercher</button>
                        </div>
                    </form>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Vous êtes authentifié!') }}
                        @if (auth()->user()->is_admin)
                            <a href="{{ url('/register') }}">Créer un administrateur</a>
                            <div class=”panel-heading”>Espace administrateur</div>
                        @else
                            <div class=”panel-heading”>Espace employé</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
