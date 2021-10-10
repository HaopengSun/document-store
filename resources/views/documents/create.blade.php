@extends('layouts.app')

@section('content')
    <h1>Create Document</h1>
    <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="form-group">
        <label for="description">Description</label>
            <textarea type="text" id="summary-ckeditor" name="description" class="form-control" placeholder="Description"></textarea>
        </div>
        <label for="file">Select file</label>
            <input type="file" id="file" name="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>

@endsection
