<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{
    public function getRecommendedBooks()
    {
        $recommendedBooks = Book::select('books.id', 'books.book_name')
            ->leftJoin('reading_intervals', 'reading_intervals.book_id', '=', 'books.id')
            ->groupBy('books.id', 'books.book_name')
            ->orderBy(DB::raw('SUM(reading_intervals.end_page - reading_intervals.start_page)'), 'desc')
            ->take(5)
            ->get();

        return response()->json($recommendedBooks);
    }
}
