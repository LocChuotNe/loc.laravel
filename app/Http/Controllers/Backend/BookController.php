<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Service\BookService;

class BookController extends Controller
{
    public function __construct(BookService $bookService){
        $this->bookService = $bookService;
    }

    public function index(Request $request){
        $books = Book::with('category')->get();
    
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $books
            ]);
        }
    
        $template = 'backend.library.book.layout';
        return view('backend.dashboard.layout', compact('template', 'books'));
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        $this->bookService->importBooks($request->file('file'));

        return redirect()->back()->with('success', 'Đang import dữ liệu');
    }
}
