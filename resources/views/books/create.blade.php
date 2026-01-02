@extends('layouts.app')

@section('title', 'Create New Book')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">➕ Create New Book</h2>

            <a href="{{ route('book.list') }}" class="btn btn-outline-secondary btn-sm">
                ← Back to List
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form action="{{ route('book.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}"
                                    placeholder="Enter book title">
                            </div>

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Author</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror"
                                    id="author" name="author" value="{{ old('author') }}"
                                    placeholder="Enter author name">
                            </div>

                            @error('author')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label for="published_year" class="form-label fw-semibold">Published Year</label>
                                <input type="number" class="form-control @error('published_year') is-invalid @enderror"
                                    id="published_year" name="published_year" value="{{ old('published_year') }}"
                                    min="1900" max="2100" placeholder="e.g. 2024">

                                @error('published_year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-check mb-4">
                                <input type="hidden" name="is_available" value="0">
                                <input class="form-check-input" type="checkbox" id="is_available" name="is_available"
                                    value="1" {{ old('is_available', 1) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_available">
                                    Available
                                </label>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('book.list') }}" class="btn btn-light">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-success">
                                    Save Book
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
