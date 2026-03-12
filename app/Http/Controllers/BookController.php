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
    public function index(Request $request)
    {
        $authorId = $request->get('author_id', null);

        $booksQuery = Book::query();
        if ($authorId !== null) {
            // $booksQuery->whereAuthorId($authorId);
            $booksQuery->where('author_id', '=', $authorId);
        }
        $booksQuery->with('author');
        $books = $booksQuery->get();
        return $books;
    }

    /**
     * This endpoint shows a specific book
     * 
     * @param Book $book The book I want to show
     * @return Book
     */
    public function show(Book $book)
    {
        // this will load 'author' on 'book'
        // this does a query
        // $author = $book->author;

        // this does NOT do a query
        // $authorOther = $book->author;

        $book->load('author');
        return $book;
    }
}
