<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['book_name' => 'Design Patterns'],
            ['book_name' => 'Clean Code'],
            ['book_name' => 'Algorithms'],
            ['book_name' => 'Data Structures'],
            ['book_name' => 'Maths'],
            ['book_name' => 'Science'],
            ['book_name' => 'History'],
            ['book_name' => 'Statistics'],
            ['book_name' => 'Data Base'],
            ['book_name' => 'JavaScript'],

        ]);
    }
}
