<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use App\Models\Technology;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __invoke()
    {
        

        $proyects = Proyect::all();
        $technologies =  Technology::paginate();
        return view('welcome', compact('proyects', 'technologies'));
    }
}
