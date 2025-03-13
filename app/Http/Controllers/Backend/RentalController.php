<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $template = 'backend.library.rental.layout';
        return view('backend.dashboard.layout', compact(
            'template',
        ));
    }
}
