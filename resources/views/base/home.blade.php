@extends('template')

@section('main')
    @include('errors')
    <div class="jumbotron">
        @if(Auth::check())
            <div class="alert alert-success">Welcome, {{ Auth::user()->display_name }}. You have successfully logged in.</div>

            <p>You can find a list of available events by <a href="{{ route('events.base') }}">clicking here</a>.</p>
        @else
            <p class="text-info">You need to <a href="{{ route('auth.twitch') }}">connect with <i class="fa fa-twitch fa-1x"></i> Twitch</a> to access these pages.</p>
        @endif
    </div>
@endsection
