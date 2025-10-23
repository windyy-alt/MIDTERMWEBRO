<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class BorrowController extends Controller
{
    public function index()
    {
        $borrow = Borrow::with(['member', 'book'])->get();
        $books = Book::all();
        $members = Member::all();

        return view('borrow', compact('borrow', 'books', 'members'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'book_id' => 'required',
        ]);

        Borrow::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
            'borrowed_at' => now(),
            'status' => 'Borrowed',
        ]);

        return redirect()->route('borrow.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $loan = Borrow::findOrFail($id);

        if ($request->status === 'Returned') {
            $loan->update([
                'status' => 'Returned',
                'returned_at' => now(),
            ]);
        }

        return redirect()->route('borrow.index')->with('success', 'Status peminjaman diperbarui.');
    }

  
    public function destroy($id)
    {
        $loan = Borrow::findOrFail($id);
        $loan->delete();

        return redirect()->route('borrow.index')->with('success', 'Data peminjaman dihapus.');
    }

 
    public function exportCSV()
    {
        $loans = Borrow::with(['member', 'book'])->get();
        $filename = "loans_" . date('Ymd_His') . ".csv";

        $handle = fopen('php://output', 'w');
        $columns = ['ID', 'Member', 'Book', 'Borrowed At', 'Returned At', 'Status'];

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function() use ($loans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($loans as $loan) {
                fputcsv($file, [
                    $loan->id,
                    $loan->member->name ?? '-',
                    $loan->book->title ?? '-',
                    $loan->borrowed_at,
                    $loan->returned_at ?? '-',
                    $loan->status
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}