<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendContactForm;
use App\Models\Proyect;
use App\Models\Technology;
use Illuminate\Support\Facades\Mail;
class ContactFormController extends Controller
{
    public function index()
    {
        return view('/welcome');
    }
    public function contactForm(Request $request)
    {
        $proyects = Proyect::all();
        $technologies =  Technology::paginate();
        
        $email = new SendContactForm($request->all());
        Mail::to('CristianGualteros23@gmail.com')->send($email);
        $message = ['text-success','Message sent'];

        return view('/welcome', compact('proyects', 'technologies','message'));
    }
}
