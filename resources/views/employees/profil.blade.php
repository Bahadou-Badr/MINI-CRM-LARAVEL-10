@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{ session('status') }}
            </div>
        @endif
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="mb-2">Informations Personnelles</h2>
                        <div class="mb-1 text-muted"><strong>Rejoindre :
                            </strong>{{ $employee->created_at->locale('fr')->diffForHumans() }} </div>
                        <p class="text mb-auto"><strong>Nom : </strong> {{ $employee->name }}</p>
                        <p class="text mb-auto"><strong>Numéro de téléphone : </strong> {{ $employee->phone }}</p>
                        <p class="text mb-auto"><strong>Email : </strong> {{ $employee->email }}</p>
                        <p class="text mb-auto"><strong>Adresse : </strong> {{ $employee->address }}</p>
                        <p class="text mb-auto"><strong>Date de naissance : </strong> {{ $employee->birth_date }}</p>
                        <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                            class="btn btn-warning mt-3">modifier les données
                            personnelles </a>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-3">Votre Organisation</h3>
                        <p class="text mb-auto"><strong>Nom de l'entreprise : </strong>
                            {{ $employee->company->company_name }}</p>
                        <p class="text mb-auto"><strong>adresse : </strong>{{ $employee->company->address }}</p>
                        <a href="{{ route('company.employees', ['company' => $employee->company->id]) }}" class="link"><strong>Voir les employés de cette société</strong></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
