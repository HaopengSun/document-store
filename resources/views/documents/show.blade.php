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
    <div>
        <h5>File name: {{ $document->file }}</h5>
    </div>
    <small>Written on {{$document->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $document->user_id)
            <a href="{{ route('document.download', ['id'=>$document->id, 'file'=>$document->file]) }}">Download file</a>
            <a href="/documents/{{$document->id}}/edit" class="btn btn-default">Edit</a>
            <form action="{{ route('documents.destroy', $document->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-default">Delete</button>
            </form>
        @endif
    @endif
@endsection
