<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverdueController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        $template = 'backend.library.overdue.layout';
        return view('backend.dashboard.layout', compact(
            'template',
        ));
    }
}
