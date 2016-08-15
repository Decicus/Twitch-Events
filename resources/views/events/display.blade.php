@extends('template')

@section('main')
    <div class="jumbotron">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $event->title }}</h3>
            </div>

            <div class="panel-body">
                {!! BBCode::parseCaseInsensitive($event->description) !!}
            </div>

            <div class="panel-footer">
                {{-- TODO: Add join/leave buttons. --}}
                There is nothing here yet.
            </div>
        </div>

        {{-- TODO: Add user list for logged in admins. --}}
    </div>
@endsection
