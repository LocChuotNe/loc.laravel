<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Exports\RentalExport;
use Maatwebsite\Excel\Facades\Excel;


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

    public function export(){
        return Excel::download(new RentalExport(), 'rentals.xlsx');
    }
}
