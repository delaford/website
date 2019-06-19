@extends('layouts.app')

@section('content')
    <div class="empty">
        <div class="columns">
            <div class="column col-7">
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
            <div class="column col-5 flex content-center">
                <div class="column col-12">
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
