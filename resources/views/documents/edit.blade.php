
@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('documents.update', $document->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $document->title }}">
        </div>
        <div class="form-group">
        <label for="description">Description</label>
            <textarea type="text" id="summary-ckeditor" name="description" class="form-control" placeholder="Description"
            value="{{ $document->description }}"></textarea>
        </div>
        <div>
            <a href="{{ route('document.viewfile', ['id'=>$document->id, 'file'=>$document->file]) }}">View file</a>
        </div>
        <label for="file">Replace file</label>
            <input type="file" id="file" name="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection