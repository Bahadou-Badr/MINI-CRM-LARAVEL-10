@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{ session('status') }}
            </div>
        @endif
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3 class="text-center mr-4">Liste d'entreprises</h3>
                    <a class="btn btn-info" href="{{ route('companies.create') }}">
                        Ajouter nouvelle entreprise
                    </a>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <h3 class="text">Liste d'entreprises</h3>
                        <p class="text-muted text-light">Vous pouvez ajouter une entreprise, <a class="link-primary"
                                href="{{ route('companies.create') }}"><strong>Ajouter nouvelle entreprise</strong></a></p>
                    </div>
                    <div class="d-flex align-items-end">
                        <form action="\companies" method="get">
                            <div class="input-group">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="order">
                                    <option selected value="none">Trier</option>
                                    <option value="asc">tri croissant</option>
                                    <option value="desc">tri décroissant</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Trier</button>
                            </div>

                        </form>
                    </div>
                </div>
                @if ($companies->count() > 0)
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom de l'entreprise</th>
                                <th>adresse</th>
                                <th>Nombre d'employees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>
                                        @if ($company->users_count)
                                            <div>
                                                <span class="badge bg-primary">{{ $company->users_count }} employé
                                                    (s)
                                                </span>
                                            </div>
                                        @else
                                            <div>
                                                <span class="badge bg-dark">aucun employé pour l'instant!! </span>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary"
                                                href="{{ route('companies.edit', ['company' => $company->id]) }}">modifier</a>
                                            @if (!$company->users_count)
                                                <form style="display:inline" method="POST"
                                                    action="{{ route('companies.destroy', ['company' => $company->id]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger" type="submit">supprimer</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex">
                        {!! $companies->links() !!}
        
                    </div>
                @else
                    <div class="alert alert-light border border-secondary mt-4" role="alert">
                        La liste est actuellement vide, <a class="link" href="{{ route('companies.create') }}">
                            Ajouter une nouvelle entreprise
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
