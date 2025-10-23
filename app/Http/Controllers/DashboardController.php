<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\Borrow;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::count();
        $categories = Category::count();
        $members = Member::count();
        $borrow = Borrow::count();

        return view('dashboard', compact('books', 'categories', 'members', 'borrow'));
    }
}