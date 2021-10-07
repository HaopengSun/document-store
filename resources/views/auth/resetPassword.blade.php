@extends('layouts.app')

@section('content')
    <h1 class='text-center'>Reset your password</h1>

    <form class="w-50 m-auto" method="post" action="{{ route('password.update') }}">
        @csrf
    
        <input type="hidden" name="token" value="{{ $token }}">
    
        <div class="form-group">
            <label for="email">Email</label>
            <input required type="email" name="email" id="email" class="form-control" value="{{ request('email') }}" />
            @error('email') {{ $message }} @enderror
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input required type="password" name="password" class="form-control" id="password" />
            @error('password') {{ $message }} @enderror
        </div>


        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input required type="password" name="password_confirmation" class="form-control" id="password_confirmation" />
            @error('password_confirmation') {{ $message }} @enderror
        </div>
    
        <button class="btn btn-outline-primary" type="submit">Reset</button>
    </form>
@endsection