<?php

namespace App\Http\Controllers\Web;

use Illuminate\View\View;
use App\Services\ReviewService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    private ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(): View
    {
        $reviews = $this->reviewService->getReviews();
        return view("reviews.index", compact("reviews"));
    }

    public function show(int $id): View
    {
        $review = $this->reviewService->getReview($id);
        return view("reviews.view", compact("review"));
    }

    public function create(): View
    {
        return view("reviews.create");
    }

    public function store(ReviewRequest $request)
    {
        try {
            $this->reviewService->addReview($request);
            return redirect()->route("review.list")->with("success", "Review added successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when add review");
        }
    }
}
