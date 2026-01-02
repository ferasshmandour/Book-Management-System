<?php

namespace App\Http\Controllers\API;

use App\Services\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(): JsonResponse
    {
        $books = $this->bookService->getBooks();
        return $this->successResponse($books);
    }

    public function show(int $id): JsonResponse
    {
        $book = $this->bookService->getBook($id);
        return $this->successResponse($book);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        $this->bookService->createBook($request);
        return $this->successResponse(null, "Book created successfully", 201);
    }

    public function update(UpdateBookRequest $request, int $id): JsonResponse
    {
        $this->bookService->updateBook($request, $id);
        return $this->successResponse(null, "Book updated successfully");
    }

    public function destroy($id): JsonResponse
    {
        $this->bookService->deleteBook($id);
        return $this->successResponse(null, "Book deleted successfully");
    }
}
