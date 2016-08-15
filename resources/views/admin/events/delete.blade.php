@extends('template')

@section('main')
    <div class="jumbotron">
        @include('errors')

        @if (count($events) > 0)
            <h2>Available events for deletion:</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Event ID:</th>
                        <th>Event title:</th>
                        <th>Action:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <th>{{ $event->title }}</th>
                            <td>
                                <form action="{{ route('admin.events.delete.post') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $event->id }}">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash fa-1x"></i> Delete event</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-primary">There are no events to delete. <a href="{{ route('admin.events.add') }}">Add one!</a></p>
        @endif
    </div>
@endsection
