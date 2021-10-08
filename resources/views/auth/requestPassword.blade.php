@extends('layouts.app')

@section('content')
    <h1 class='text-center'>Forgot your password?</h1>
    <p class='text-center'>Fill in your email below and we'll send you a link to reset your password.</p>

    <form class="w-50 m-auto" method="post" action="{{ route('password.email', app()->getLocale()) }}">
        @csrf

        @if(session()->has('success'))
            {{ session()->get('success') }}
        @endif

        <div class="form-group">
            <label for="email">Your email</label>
            <input required type="email" name="email" id="email" />
            @error('email') {{ $message }} @enderror
        </div>
        <button class="btn btn-outline-primary" type="submit">Request</button>
    </form>
@endsection