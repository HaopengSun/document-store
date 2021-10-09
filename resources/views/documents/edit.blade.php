
@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('documents.update', $document->id) }}" method="post">
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
        <label for="file">Select file</label>
            <input type="file" id="summary-ckeditor" name="file" class="form-control" placeholder="Description">
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection