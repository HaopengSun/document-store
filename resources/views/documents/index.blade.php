@extends('layouts.app')

@section('content')
    <h1>Documents</h1>
    <div class="container">
        @include('inc.message')
    </div>
    <a href="{{ route('documents.create') }}">Add new document</a>
    @if(count($documents) > 0)
        @foreach($documents as $document)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="{{ route('documents.show', $document->id) }}">{{$document->title}}</a></h3>
                        <small>Written on {{$document->created_at}} by {{$document->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No documents found</p>
    @endif
@endsection