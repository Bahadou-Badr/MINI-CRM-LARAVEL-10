@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3 class="text-center mr-4">Liste d'invitations</h3>
                    <a class="btn btn-info" href="{{ route('invitations.create') }}">
                        inviter un employé
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($invitations->count() > 0)
                    <table class="table table-hover mt-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Nom de l'employee</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invitations as $invitation)
                                <tr>
                                    <td>{{ $invitation->id }}</td>
                                    <td>{{ $invitation->email }}</td>
                                    <td>{{ $invitation->employer_name }}</td>
                                    <td>
                                        @if ($invitation->status == 0)
                                            <span class="badge rounded-pill bg-secondary">EN ATTENTE</span>
                                        @elseif($invitation->status == 1)
                                            <span class="badge rounded-pill bg-primary">VALIDÉE</span>
                                        @else
                                            <span class="badge rounded-pill bg-warning">ANNULÉE</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($invitation->status == 0)
                                            <form method="POST"
                                                action="{{ route('cancel.invitation', ['invitation' => $invitation->id]) }}">
                                                @csrf
                                                @method('PUT')

                                                <button class="btn btn-danger" type="submit">Annuler</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-light border border-secondary mt-4" role="alert">
                        La liste est actuellement vide, <a class="link" href="{{ route('invitations.create') }}">
                            inviter un employé
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
