@extends('template')

@section('main')
    <div class="jumbotron">
        @include('errors')
        <form action="{{ route('admin.events.add') }}" method="post">
            @include('admin.events.form')

            <button type="submit" class="btn btn-success">
                <i class="fa fa-plus-square fa-1x"></i> Add event
            </button>
        </form>
    </div>
@endsection
