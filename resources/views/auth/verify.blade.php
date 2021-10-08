@extends('layouts.app')

@section('content')

<h1 class='text-center'>Verify email</h1>

<p class='text-center'>Please verify your email address by clicking the link in the mail we just sent you. Thanks!</p>

<form class="w-50 m-auto text-center" action="{{ route('verification.request', app()->getLocale()) }}" method="post">
    @csrf
    <button class="btn btn-outline-primary" type="submit">Request a new link</button>
</form>

@endsection