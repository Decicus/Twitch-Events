@extends('template')

@section('main')
    @include('errors')
    <div class="jumbotron">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $event->title }}</h3>
            </div>

            <div class="panel-body">
                {!! Markdown::convertToHtml($event->description) !!}
            </div>

            <div class="panel-footer">
                @if (empty($event->users()->where(['id' => Auth::user()->id])->first()))
                    <form action="{{ route('events.join') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-sign-in fa-1x"></i> Join the event
                        </button>
                    </form>
                @else
                    <form action="{{ route('events.leave') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-sign-out fa-1x"></i> Leave the event
                        </button>
                    </form>
                @endif
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
