<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        $categories = Category::orderBy('id', 'asc')->get();

        return view('books', compact('books', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('books.partials.update', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    
}
