@extends('layouts.app')

@section('content')
    <div class="empty">
        <div class="columns">
            <div class="column col-7 text-left">
                <h1>Hiscores</h1>
                <ul class="tab tab-block">
                    <li class="tab-item active">
                        <a href="#">Mining</a>
                    </li>
                    <li class="tab-item">
                        <a href="#" title="Coming soon!">Smithing</a>
                    </li>
                    <li class="tab-item">
                        <a href="#" title="Also coming soon.">Fishing</a>
                    </li>
                </ul>
                <table class="table table-striped">
                    <thead class="text-bold">
                        <tr>
                            <td>#</td>
                            <td>Player</td>
                            <td>Level</td>
                            <td>Experience</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hiscores['skills']['mining'] as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value['user']['username'] }}</td>
                            <td>{{ $value['mining_level'] }}</td>
                            <td>{{ number_format($value['mining_experience']) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="column col-5" style="display: flex; align-items: center">
                <div class="col-12">
                    <p class="empty-subtitle">Register to play in seconds!</p>
                    <div class="empty-action">
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a> or <a href="https://play.delaford.com" class="btn btn-primary">Play Now</a>
                    </div>

                    <p class="empty-subtitle pt-3">
                        Interesting in joining development?
                    </p>

                    <div class="empty-action">
                        <a href="https://github.com/delaford/game" class="btn btn-primary">View the Code</a> or <a href="https://docs.delaford.com" class="btn btn-primary">Documentation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
