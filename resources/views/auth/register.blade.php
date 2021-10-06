@extends('layouts.app')

@section('content')
    <form class="w-50 m-auto" action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="User" value="{{ old('name') }}">

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
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
        <div class="form-group">
            <label for="password_confirmation">Password Confirm</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password again">

            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection