@extends('template')

@section('main')
    <div class="jumbotron">
        <h2>Available events:</h2>
        <div class="list-group">
            @foreach ($events as $event)
                <a href="{{ route('events.id', $event->id) }}" class="list-group-item">
                    @if (!empty($event->users()->where(['id' => Auth::user()->id])->first()))
                        <span class="label label-success"><i class="fa fa-check-circle fa-1x"></i></span>
                    @else
                        <span class="label label-danger"><i class="fa fa-times-circle fa-1x"></i></span>
                    @endif
                    <strong>{{ $event->title }}</strong>
                </a>
            @endforeach
        </div>
    </div>
@endsection
