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

        @if (Auth::user()->admin)
            <h3>Signed up users ({{ count($users) }}):</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Twitch username:</th>
                        <th>Sign up time:</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->display_name }}</th>
                        <td>{{ $user->pivot->created_at->tz(env('TIMEZONE', 'UTC'))->format('Y-m-d h:i:s A T') }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
