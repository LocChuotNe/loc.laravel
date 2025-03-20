<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        $books = Book::with('category')->get();
    
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $books
            ]);
        }
    
        $template = 'backend.library.book.layout';
            return view('backend.dashboard.layout', compact(
                'template',
                'books')
            );
    }
}
