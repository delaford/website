@extends('layouts.app')

@section('content')
    <div class="empty">
        <div class="columns">
            <div class="column col-7">
                <div class="empty-icon">
                    <i class="fas fa-cubes fa-5x"></i>
                </div>
                <p class="empty-title h5">Welcome to Navarra.</p>
                <p class="empty-subtitle">Register to play in seconds!</p>
                <div class="empty-action">
                    <a href="{{ route('register') }}" class="btn btn-primary">Start your Adventure</a>
                </div>
            </div>
            <div class="column col-5 text-left">
                <h4 class="subtitle">Features</h4>
                <ul>
                    <li>Kill rats, goblins and more.</li>
                    <li>Mine your ore; smith your items.</li>
                    <li>Track your statistics indepth.</li>
                    <li>Trade &amp; talk with other players.</li>
                    <li>Complete quests; earn rewards.</li>
                    <li>Free to play; no fees.</li>
                    <li>See how you fare in the <a href="{{ url('/hiscores') }}">hiscores</a>.</li>
                </ul>
            </div>
        </div>

    </div>
@endsection
