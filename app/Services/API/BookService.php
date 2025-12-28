<?php

namespace App\Services\API;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
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
        Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "published_year" => $request->published_year,
            "is_available" => $request->is_available,
        ]);
    }

    public function updateBook(UpdateBookRequest $request, int $id): void
    {
        Book::find($id)->update([
            "title" => $request->title,
            "author" => $request->author,
            "published_year" => $request->published_year,
            "is_available" => $request->is_available,
        ]);
    }

    public function deleteBook(int $id): void
    {
        Book::destroy($id);
    }
}
