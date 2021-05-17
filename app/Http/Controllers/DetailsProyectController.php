<?php

namespace App\Http\Controllers;

use App\Models\DetailsProyect;
use App\Models\Proyect;
use App\Models\Technology;
use Illuminate\Http\Request;

/**
 * Class DetailsProyectController
 * @package App\Http\Controllers
 */
class DetailsProyectController extends Controller
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
        $technologies = Technology::all();
        $proyects = Proyect::all();

        $detailsProyect = DetailsProyect::all();
        $detailsProyect = Proyect::paginate();
        return view('details-proyect.index', compact('proyects', 'technologies', 'detailsProyect'));
        /*->with('i', (request()->input('page', 1) - 1) * $proyects->perPage());*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailsProyect = new DetailsProyect();
        return view('details-proyect.create', compact('detailsProyect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetailsProyect::$rules);

        $detailsProyect = DetailsProyect::create($request->all());

        return redirect()->route('details-proyects.index')
            ->with('success', 'DetailsProyect created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailsProyect = DetailsProyect::find($id);

        return view('details-proyect.show', compact('detailsProyect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailsProyect = DetailsProyect::find($id);

        return view('details-proyect.edit', compact('detailsProyect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetailsProyect $detailsProyect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailsProyect $detailsProyect)
    {
        request()->validate(DetailsProyect::$rules);

        $detailsProyect->update($request->all());

        return redirect()->route('details-proyects.index')
            ->with('success', 'DetailsProyect updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detailsProyect = DetailsProyect::find($id)->delete();

        return redirect()->route('details-proyects.index')
            ->with('success', 'DetailsProyect deleted successfully');
    }
}
