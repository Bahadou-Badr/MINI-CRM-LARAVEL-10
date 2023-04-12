@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="container-fluid">
                @if (count($results) > 0)
                    <ul class="list-group">
                        @foreach ($results as $result)
                            <li class="list-group-item">{{ $result->name }} - {{ $result->address }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun résultat trouvé</p>
                @endif
            </div>
        </div>
    </div>
@endsection
