<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
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
        // $rentals = Rental::with(['customer', 'book'])->get();
        $rentals = DB::table('rentals')
            ->join('customers', 'rentals.customer_id', '=', 'customers.id')
            ->select(
                'rentals.id',
                'customers.name as customer_name',
                'rentals.title as book_title',
                'rentals.rental_date',
                'rentals.return_date',
                'rentals.status'
            )
            // ->where('rentals.status', 'returned') 
            ->get();
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
