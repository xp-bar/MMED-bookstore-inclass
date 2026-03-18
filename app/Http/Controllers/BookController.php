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
        $authorName = $request->get('author_name', '');

        $booksQuery = Book::query();
        if ($authorId !== null) {
            $booksQuery->where('author_id', '=', $authorId);
        }

        if (! empty($authorName)) {
            $booksQuery->whereHas('author', function ($authorQuery) use ($authorName) {
                $authorQuery->where('name', 'LIKE', '%' . $authorName . '%');
            });
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
        $book->load('author');
        return $book;
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $authorId = $request->input('author_id', null);
        $publisherId = $request->input('publisher_id', null);

        // $book = new Book([]);
        // $book = Book::make([]);  ::make() is the same as new Class() (only for models)
        // $book->save(); if you "new Model" or ::make() a model, you have to call ->save()
        $book = Book::create([
            'title' => $title,
        ]); // create does both in the same step

        $book->author()->associate($authorId);
        $book->save();

        return $book;
    }
}
