<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('SITE_TITLE') }} - {{ $page or 'Unknown' }}</title>
        <link rel="stylesheet" href="/static/css/bootstrap.min.css" charset="utf-8">
        <link rel="stylesheet" href="/static/css/cyborg.min.css" charset="utf-8">
        <link rel="stylesheet" href="/static/css/font-awesome.min.css" charset="utf-8">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}">{{ env('SITE_TITLE') }}</a>
                </div>

                <ul class="nav navbar-nav">
                    <li{!! $page === 'Home' ? ' class="active"' : '' !!}><a href="{{ route('home') }}"><i class="fa fa-home fa-1x"></i> Home</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <div class="dropdown">
                            <a href="#" type="button" class="btn btn-default navbar-btn dropdown" data-toggle="dropdown">
                                <i class="fa fa-user fa-1x"></i> {{ Auth::user()->display_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li role="presentation"><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out fa-1x"></i> Log out</a></li>
                            </ul>
                        </div>
                    @else
                        <li><a href="{{ route('auth.twitch') }}"><i class="fa fa-twitch fa-1x"></i> Connect with Twitch</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="page-header">
                <h1>{{ env('SITE_TITLE') }} - {{ $page or 'Unknown' }}</h1>
            </div>

            @yield('main')
        </div>

        <script src="/static/js/jquery-1.12.4.min.js" charset="utf-8"></script>
        <script src="/static/js/bootstrap.min.js" charset="utf-8"></script>
    </body>
</html>
