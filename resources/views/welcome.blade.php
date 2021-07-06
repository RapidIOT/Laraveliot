@extends('layouts.main')


    @section('main-menu')
        @if (Route::has('login'))
                @auth
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
        @endif
    @endsection

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Rapid IOT
        </div>

    </div>
@endsection
