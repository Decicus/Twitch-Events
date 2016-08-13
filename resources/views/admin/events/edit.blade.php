@extends('template')

@section('main')
    <form action="{{ route('admin.events.edit') }}" method="post">
        @include('admin.events.form')
    </form>
@endsection
