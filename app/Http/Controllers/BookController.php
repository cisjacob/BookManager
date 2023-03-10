<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
        $books = Book::select('id', 'title', 'content')->get();
        return view('contents.books.index')->with('books', $books);
    }

    public function create(){
        return view('contents.books.add');
    }

    public function store(StoreBookRequest $request)
    {
        try {

            $book = $request->title;

            Book::create([
                'title' => $request->title,
                'content' => $request->content
            ]);

            return redirect()->route('books.index')->with('success', $book . " has been published!");
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(Book $book)
    {
        return view('contents.books.edit')->with('book', $book);
    }


    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            $book->update([
                'title' => $request->title,
                'content' => $request->content
            ]);

            return redirect()->route('books.index')->with('success', $request->title . ' has been updated.');
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }
    }


    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return redirect()->route('books.index')->with('success', $book->title . ' has been deleted.');
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }
    }
}
