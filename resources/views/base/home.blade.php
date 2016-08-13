@extends('template')

@section('main')
    @include('errors')
    <div class="jumbotron">
        @if(Auth::check())
            <p class="text-success">Welcome, {{ Auth::user()->display_name }}. You have successfully logged in.</p>
        @else
            <p class="text-info">You need to <a href="{{ route('auth.twitch') }}">connect with <i class="fa fa-twitch fa-1x"></i> Twitch</a> to access these pages.</p>
        @endif
    </div>
@endsection
