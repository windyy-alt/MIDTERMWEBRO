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
            $category = Category::orderBy('id', 'asc')->get(); 
            return view('books', compact('books', 'category'));
        }

    public function create()
    {
        return response()->json(Category::all());
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'nullable|image|max:2048',
        ]);

        $cover = $request->hasFile('cover')
            ? $request->file('cover')->store('covers', 'public')
            : null;

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'cover' => $cover,
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

  
    public function edit(Book $book)
    {
        return response()->json([
            'book' => $book,
            'categories' => Category::all(),
        ]);
    }

    
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $book->cover = $request->file('cover')->store('covers', 'public');
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }


   
    public function search(Request $request)
    {
        $query = Book::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->with('category')->get();
        $categories = Category::all();

        return view('books', compact('books', 'categories'));
    }

}