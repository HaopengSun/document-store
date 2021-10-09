@extends('layouts.app')

@section('content')
    <h1>Create Document</h1>
    <form action="{{ route('documents.create') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="form-group">
        <label for="password">Description</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>

@endsection
