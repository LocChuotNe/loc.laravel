<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverdueController extends Controller
{
    public function __construct(){

    }

    public function index(){
        echo 'Chức năng màn này đang được bảo trì'; die();
    //     $template = 'backend.rentalbook.rental.layout';
    //     return view('backend.dashboard.layout', compact(
    //         'template',
    //     ));
    }
}
