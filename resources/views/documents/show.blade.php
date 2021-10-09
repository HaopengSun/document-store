@extends('layouts.app')

@section('content')
    <h1>Document Details</h1>
    <a href="/documents" class="btn btn-default">Go Back</a>
    <h1>{{$document->title}}</h1>
    <br><br>
    <div>
        {!!$document->description!!}
    </div>
    <hr>
    <small>Written on {{$document->created_at}}</small>
    <hr>
@endsection
