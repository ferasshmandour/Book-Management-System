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
        return response()->json([
            'data' => $this->bookService->getBooks(),
        ], 200);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json([
            'data' => $this->bookService->getBook($id),
        ], 200);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        $this->bookService->createBook($request);
        return response()->json([
            'message' => 'Book created successfully'
        ], 201);
    }

    public function update(UpdateBookRequest $request, int $id): JsonResponse
    {
        $this->bookService->updateBook($request, $id);
        return response()->json([
            'message' => 'Book updated successfully'
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        $this->bookService->deleteBook($id);
        return response()->json([
            'message' => 'Book deleted successfully'
        ], 200);
    }
}
