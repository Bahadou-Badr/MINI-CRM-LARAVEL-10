@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inviter un employe') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('invitations.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="employer_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __("Nom de l'employeur") }}</label>

                                <div class="col-md-6">
                                    <input id="employer_name" type="employer_name"
                                        class="form-control @error('employer_name') is-invalid @enderror"
                                        name="employer_name" value="{{ old('employer_name') }}" required
                                        autocomplete="employer_name" autofocus>

                                    @error('employer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Adresse e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="company"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Entreprise') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example" name="company">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Envoyer l'invitation") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
