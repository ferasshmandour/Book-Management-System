@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">✏️ Edit Book</h2>

            <a href="{{ route('book.list') }}" class="btn btn-outline-secondary btn-sm">
                ← Back to List
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form action="{{ route('book.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $book->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Author</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    value="{{ $book->author }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="published_year" class="form-label fw-semibold">Published Year</label>
                                <input type="number" class="form-control" id="published_year" name="published_year"
                                    value="{{ $book->published_year }}" min="1900" max="2100" required>
                            </div>

                            <div class="form-check mb-4">
                                <input type="hidden" name="is_available" value="0">
                                <input class="form-check-input" type="checkbox" id="is_available" name="is_available"
                                    value="1" {{ $book->is_available ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_available">
                                    Available
                                </label>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('book.list') }}" class="btn btn-light">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-success">
                                    Update Book
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
