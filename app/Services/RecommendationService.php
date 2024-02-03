<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class RecommendationService
{
    public function getRecommendedBooks()
    {
        return Book::select('books.id', 'books.book_name', DB::raw('SUM(reading_intervals.end_page - reading_intervals.start_page) as num_of_read_pages'))
            ->leftJoin('reading_intervals', 'reading_intervals.book_id', '=', 'books.id')
            ->groupBy('books.id', 'books.book_name')
            ->orderBy(DB::raw('num_of_read_pages'), 'desc')
            ->take(5)
            ->get();

    }
}
