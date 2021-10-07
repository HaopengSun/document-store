@extends('layouts.app')

@section('content')
    <h1>Forgot your password?</h1>
    <p>Fill in your email below and we'll send you a link to reset your password.</p>

    <form method="post" action="{{ route('password.email') }}">
        @csrf

        @if(session()->has('success'))
            {{ session()->get('success') }}
        @endif
    
        <label for="email">Your email</label>
        <input required type="email" name="email" id="email" />
        @error('email') {{ $message }} @enderror
        <button type="submit">Request</button>
    </form>
@endsection