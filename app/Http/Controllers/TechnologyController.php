<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

/**
 * Class TechnologyController
 * @package App\Http\Controllers
 */
class TechnologyController extends Controller
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
            $technologies = Technology::paginate();

            return view('technology.index', compact('technologies'))
                ->with('i', (request()->input('page', 1) - 1) * $technologies->perPage());
        } else {
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
            $technology = new Technology();
            return view('technology.create', compact('technology'));
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
        request()->validate(Technology::$rules);

        $technology = Technology::create($request->all());

        return redirect()->route('technologies.index')
            ->with('success', 'Technology created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technology = Technology::find($id);

        return view('technology.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technology = Technology::find($id);

        return view('technology.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        request()->validate(Technology::$rules);

        $technology->update($request->all());

        return redirect()->route('technologies.index')
            ->with('success', 'Technology updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $technology = Technology::find($id)->delete();

        return redirect()->route('technologies.index')
            ->with('success', 'Technology deleted successfully');
    }
}
