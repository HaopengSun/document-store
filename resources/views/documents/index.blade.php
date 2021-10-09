@extends('layouts.app')

@section('content')
    <h1>Documents</h1>
    @if(count($documents) > 0)
        @foreach($documents as $document)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/documents/{{$document->id}}">{{$document->title}}</a></h3>
                        <small>Written on {{$document->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No documents found</p>
    @endif
@endsection