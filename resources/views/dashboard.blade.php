@extends('layouts.app')

@section('content')
    <div class="bg">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h3>Welcome, adventurer!</h3>

        <div class="empty bg-white">
            <div class="empty-icon">
                <i class="fas fa-chart-bar fa-5x"></i>
            </div>
            <p class="empty-title h5">No statistics to show</p>
            <p class="empty-subtitle">Start playing a bit so we can show you some pretty graphs.</p>
            <div class="empty-action">
            <a href="https://play.delaford.com" class="btn btn-primary">Play {{ config('app.name') }}</a>
            </div>
        </div>
    </div>
@endsection
