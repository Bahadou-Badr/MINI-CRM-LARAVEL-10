@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Employés</h2>
                <p>Les employés de votre société</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>Email</th>
                            <th>adresse</th>
                            <th>téléphone</th>
                            <th>date de naissance</th>
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
            </div>
        </div>
    </div>
@endsection
