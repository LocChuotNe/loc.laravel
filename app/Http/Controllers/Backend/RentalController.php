<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $rentals = Rental::with(['customer', 'book'])->get();
        $template = 'backend.library.rental.layout';
        return view('backend.dashboard.layout', compact(
            'template',
            'rentals',
        ));
    }
}
