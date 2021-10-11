@extends('layouts.app')

@section('content')
    <h1 class="text-center">Documents</h1>
    <div class="container">
        @include('inc.message')
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('documents.create') }}" class="text-center">Add new document</a>
    </div>
    @if(count($documents) > 0)
        @foreach($documents as $document)
            <div class="well d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="{{ route('documents.show', $document->id) }}">{{$document->title}}</a></h3>
                        <small>Written on {{$document->created_at}} by {{$document->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center">No documents found</p>
    @endif
@endsection