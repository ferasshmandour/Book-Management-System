<?php

namespace App\Services;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Cover;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    public function getBooks(): Collection
    {
        return Book::all();
    }

    public function getBook(int $id): Book
    {
        return Book::findOrFail($id);
    }

    public function createBook(StoreBookRequest $request): void
    {
        $book = Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "published_year" => $request->published_year,
            "is_available" => $request->is_available,
        ]);

        Cover::create([
            "book_id" => $book->id,
            "color" => $request->cover_color,
            "format" => $request->cover_format,
        ]);
    }

    public function updateBook(UpdateBookRequest $request, int $id): void
    {
        $book = Book::findOrFail($id);

        $book->update([
            "title" => $request->title,
            "author" => $request->author,
            "published_year" => $request->published_year,
            "is_available" => $request->is_available,
        ]);

        if ($book->cover()) {
            $book->cover()->update([
                "book_id" => $book->id,
                "color" => isset($request->cover_color) ? $request->cover_color : $book->color,
                "format" => isset($request->cover_format) ? $request->cover_format : $book->format,
            ]);
        } else {
            Cover::create([
                "book_id" => $book->id,
                "color" => $request->cover_color,
                "format" => $request->cover_format,
            ]);
        }
    }

    public function deleteBook(int $id): void
    {
        Book::destroy($id);
    }
}
