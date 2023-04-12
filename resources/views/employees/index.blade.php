@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <h3 class="text">Employés</h3>
                        <p class="text-muted text-light">Vous pouvez inviter un employee  <a href="{{ route('invitations.create') }}"><strong>Click ici</strong></a></p>
                    </div>
                    <div class="d-flex align-items-end">
                        <form action="\employees" method="get">
                            <div class="input-group">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="order">
                                    <option selected value="none">Trier</option>
                                    <option value="asc">tri croissant</option>
                                    <option value="desc">tri décroissant</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Trier</button>
                            </div>

                        </form>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Date de naissance</th>
                            <th>L'entreprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->birth_date }}</td>
                                <td>{{ $employee->company->company_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $employees->links() !!}
    
                </div>
            </div>
        </div>
    </div>
@endsection
