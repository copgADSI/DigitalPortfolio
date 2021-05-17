<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Proyect;
use App\Models\User;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{

    //Funcion para subir al servidor el CV y guardarlo en la BD
    public function uploadCV(Request $request)
    {
        $this->middleware('auth');
        request()->validate(User::$rules);
        $msg = '';
        try {
            $cv  = $request->file('curriculum')->store('public/curriculum'); //Guardar archivo storage/app/public/uploads
            $url =  Storage::url($cv); //storage/curriculum (Acceso directo)
            $id = Auth::id();
            $userCV = User::find($id);
            $userCV->curriculum = $url;
            $userCV->save();
            $msg = 'CV updated succesfull';
            return redirect()->route('home', compact('msg'));
        } catch (Exception $e) {
            $msg = 'Error to CV updated succesfull';
            return redirect()->route('home', compact('msg'));
        }
    }
    //Funcion para poder descargar del almacenamiento publico el CV
    public function downloadCV()
    {
        $userCV = User::all();
        foreach ($userCV as  $data) {
            $cv = $data->curriculum;
        }
        $url = explode('/storage/curriculum/', $cv);
        $path_file = storage_path('app/public/curriculum/'.$url[1]);
        return response()->download($path_file);
    }
}
