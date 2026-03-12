<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Return a list of books
     * 
     * @return array
     */
    public function index()
    {

        // return Book::all();
        // return Book::all()->toArray();
        // return json_encode(Book::all()->toArray());
        // return Book::all()->toJson();

        $books = Book::all()->toArray();
        return json_encode($books);
    }

    /**
     * This endpoint shows a specific book
     * 
     * @param Book $book The book I want to show
     * @return Book
     */
    public function show(Book $book)
    {
        // dd($book);
        // $book = Book::find($id);
        return $book;
    }
}
