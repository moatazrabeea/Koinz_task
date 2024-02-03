<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{

    private $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function getRecommendedBooks()
    {
        $recommendedBooks = $this->recommendationService->getRecommendedBooks();
        return response()->json($recommendedBooks);
    }
}
