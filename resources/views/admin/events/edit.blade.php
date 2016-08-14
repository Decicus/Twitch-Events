@extends('template')

@section('main')
    <div class="jumbotron">
        @include('errors')

        @if (!empty($event))
            <form action="{{ route('admin.events.edit.post') }}" method="post">
                @include('admin.events.form')

                <input type="hidden" name="id" value="{{ $event->id }}">

                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-pencil-square fa-1x"></i> Edit event
                </button>
            </form>
        @else
            @if (count($events) > 0)
                <p class="text-primary">Events available for editing:</p>
                <div class="list-group">
                @foreach($events as $event)
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="list-group-item">{{ $event->title }}</a>
                @endforeach
                </div>
            @else
                <p class="text-primary">There are no events to edit. <a href="{{ route('admin.events.add') }}">Add one!</a></p>
            @endif
        @endif
    </div>
@endsection
