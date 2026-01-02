<?php

namespace App\Http\Controllers\API;

use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    private ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(): JsonResponse
    {
        $reviews = $this->reviewService->getReviews();
        return $this->successResponse($reviews);
    }

    public function show(int $id): JsonResponse
    {
        $review = $this->reviewService->getReview($id);
        return $this->successResponse($review);
    }

    public function store(ReviewRequest $request): JsonResponse
    {
        $this->reviewService->addReview($request);
        return $this->successResponse(null, "Review added successfully", 201);
    }
}
