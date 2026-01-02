<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\BookService;
use Illuminate\View\View;

class BookController extends Controller
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(): View
    {
        $books = $this->bookService->getBooks();
        return view("books.index", compact("books"));
        //return view("books.index", ["books" => $books]);
    }

    public function show(int $id): View
    {
        $book = $this->bookService->getBook($id);
        return view("books.view", compact("book"));
    }

    public function create(): View
    {
        return view("books.create");
    }

    public function store(StoreBookRequest $request)
    {
        try {
            $this->bookService->createBook($request);
            return redirect()->route("book.list")->with("success", "Book created successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when create book");
        }
    }

    public function edit(int $id): View
    {
        $book = $this->bookService->getBook($id);
        return view("books.edit", compact("book"));
    }

    public function update(UpdateBookRequest $request, int $id)
    {
        try {
            $this->bookService->updateBook($request, $id);
            return redirect()->route("book.list")->with("success", "Book updated successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when update book");
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->bookService->deleteBook($id);
            return redirect()->back()->with("success", "Book deleted successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when delete book");
        }
    }
}
