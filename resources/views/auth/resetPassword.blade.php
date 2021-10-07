@extends('layouts.app')

@section('content')
    <h1>Reset your password</h1>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
    
        <!-- Token (hidden) -->
        <input type="text" name="token" value="{{ $token }}">
    
        <!-- Email -->
        <label for="email">Email</label>
        <input required type="email" name="email" id="email" value="{{ request('email') }}" />
        @error('email') {{ $message }} @enderror
    
        <!-- Password -->
        <label for="password">Password</label>
        <input required type="password" name="password" id="password" />
        @error('password') {{ $message }} @enderror
    
        <!-- Confirm Password -->
        <label for="password_confirmation">Confirm Password</label>
        <input required type="password" name="password_confirmation" id="password_confirmation" />
        @error('password_confirmation') {{ $message }} @enderror
    
        <button type="submit">Reset</button>
    </form>
@endsection