@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h2>Historique</h2>
                <ul class="list-group list-group-flush my-3">
                    @foreach ($actionLogs as $action)
                        <li class="list-group-item"><strong>{{ $action->created_at->format('d-m-Y - H:i') }} /
                            </strong>{{ $action->action_message }}</li>
                    @endforeach
                </ul>
                <div class="d-flex">
                    {!! $actionLogs->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
