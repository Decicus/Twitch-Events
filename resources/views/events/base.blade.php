@extends('template')

@section('main')
    <div class="jumbotron">
        <h2>Available events:</h2>
        <div class="list-group">
            @foreach ($events as $event)
                <a href="{{ route('events.id', $event->id) }}" class="list-group-item">
                    {{-- TODO: Make this less spaghetti. --}}
                    <span class="label label-{{ !empty($event->users()->where(['id' => Auth::user()->id])->first()) ? 'success' : 'danger' }}"><i class="fa fa-1x fa-{{ !empty($event->users()->where(['id' => Auth::user()->id])->first()) ? 'check-circle' : 'times-circle' }}"></i></span>
                    {{ $event->title }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
