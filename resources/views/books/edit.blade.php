@extends('layouts.app')

@section('title')
    Edit Book
@endsection

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('book.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="published_year" class="form-label">Published Year</label>
                <input type="number" class="form-control" id="published_year" name="published_year"
                    value="{{ $book->published_year }}" required>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="is_available" value="0">
                <input type="checkbox" class="form-check-input" id="is_available" name="is_available" value="1"
                    {{ $book->is_available ? 'checked' : '' }}>
                <label class="form-check-label" for="is_available">Is Available</label>
            </div>
            <x-button type="submit" class="btn btn-success">Update Book</x-button>
        </form>
    </div>
@endsection
