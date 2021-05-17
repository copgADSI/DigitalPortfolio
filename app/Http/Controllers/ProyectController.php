<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProyectController
 * @package App\Http\Controllers
 */
class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->check()) {
            $proyects = Proyect::paginate();
            $technologies = Technology::all();


            return view('proyect.index', compact('technologies', 'proyects'))
                ->with('i', (request()->input('page', 1) - 1) * $proyects->perPage());
        } else {
            return redirect()->route('/');
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check()) {
            $proyect = new Proyect();
            $techlogies = Technology::all();
            return view('proyect.create', compact('proyect', 'techlogies'));
        } else {
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $techs = $request->tech;

        request()->validate(Proyect::$rules);
        if ($request->hasFile('proyectImage')) {

            $proyectImage  = $request->file('proyectImage')->store('public/uploads'); //Guardar archivo storage/app/public/uploads
            $urlImage = Storage::url($proyectImage); //storage/uploads (Acceso directo)
        }

        $proyect = new Proyect();
        $proyect->proyectName =  $request->proyectName;
        $proyect->proyectImage  =  $urlImage;
        $proyect->proyectDescription = $request->proyectDescription;
        $proyect->url = $request->url;
        $proyect->gitHubLink = $request->gitHubLink;        
        $proyect->tech = implode(',', $request->tech);

        $proyect->save();
        return redirect()->route('proyects.index')
            ->with('success', 'Proyect created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyect = Proyect::find($id);

        return view('proyect.show', compact('proyect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /*  $proyect = Proyect::find($id);

        return view('proyect.edit', compact('proyect')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyect $proyect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyect $proyect)
    {
        request()->validate(Proyect::$rules);

        $proyect->update($request->all());

        return redirect()->route('proyects.index')
            ->with('success', 'Proyect updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proyect = Proyect::find($id)->delete();

        return redirect()->route('proyects.index')
            ->with('success', 'Proyect deleted successfully');
    }
}
