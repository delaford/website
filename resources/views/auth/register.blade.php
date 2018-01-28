@extends('layouts.app')

@section('content')
    <div class="bg">
        <form class="form-horizontal m-auto w-3/4" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <h4 class="mb-4">Register to play</h4>

            <!-- Username -->
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <div class="col-3 text-right pr-2">
                    <label class="form-label" for="username_input">Username</label>
                </div>

                <div class="col-7">
                    <input class="form-input" type="text" id="username_input" name="username" value="{{ old('username') }}" autofocus required>

                    @if ($errors->has('username'))
                        <p class="form-input-hint">{{ $errors->first('username') }}</p>
                    @endif
                </div>
            </div>

            <!-- Password -->
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-3 text-right pr-2">
                    <label class="form-label" for="password_input">Password</label>
                </div>

                <div class="col-7">
                    <input class="form-input" id="password_input" type="password" name="password" required>

                    @if ($errors->has('password'))
                        <p class="form-input-hint">{{ $errors->first('password') }}</p>
                    @endif
                </div>
            </div>

            <!-- Password confirmation -->
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="col-3 text-right pr-2">
                    <label class="form-label" for="password_input_conf">Confirm password</label>
                </div>

                <div class="col-7">
                    <input class="form-input" id="password_input_conf" type="password" name="password_confirmation" required>

                    @if ($errors->has('password'))
                        <p class="form-input-hint">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>
            </div>

            <!-- Submit button -->
            <div class="form-group">
                <div class="col-3"></div>
                <div class="col-9">
                    <button class="btn btn-primary" type="submit">Create player</button>
                </div>
            </div>
        </form>
    </div>
@endsection
