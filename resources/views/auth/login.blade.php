@extends('layouts.app')

@section('content')
    <form class="w-50 m-auto" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
            
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            
        </div>
        @if (session('status'))
            <div class="text-danger">{{ session('status') }}</div>
        @endif
            <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
    <form class="w-50 m-auto" action="{{ route('password.request') }}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-dark mt-3">Forget Password</button>
    </form>
@endsection