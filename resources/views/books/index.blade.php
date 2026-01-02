@extends('layouts.app')

@section('title')
    Book List
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Book List</h1>
        <table class="table m-5">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Published Year</td>
                    <td>Is Available</td>
                    <td>Created Date</td>
                    <td>Updated Date</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>
                            @if ($book->is_available)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        <td>
                            <x-button class="btn btn-warning btn-sm"
                                href="{{ route('book.edit', $book->id) }}">Edit</x-button>
                            <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" class="btn btn-danger btn-sm" needConfirm=true>Delete</x-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
