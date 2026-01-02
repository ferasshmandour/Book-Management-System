<?php

namespace App\Services;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;

class ReviewService
{
    public function getReviews(): Collection
    {
        return Review::all();
    }

    public function getReview(int $id): Review
    {
        return Review::findOrFail($id);
    }

    public function addReview(ReviewRequest $request): void
    {
        $book = Review::create([
            "book_id" => $request->title,
            "reviewer_name" => $request->author,
            "rating" => $request->published_year,
            "comment" => $request->is_available,
        ]);
    }
}
