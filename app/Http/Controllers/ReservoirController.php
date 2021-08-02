<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class ReservoirController extends Controller
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
        $reservoirs = Reservoir::orderBy('area', 'desc')->get();
        return view('reservoir.index', ['reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $reservoir
        return view('reservoir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reservoir_title' => ['required', 'alpha', 'min:3', 'max:200'],
            'reservoir_area' => ['required', 'numeric'], 
            'reservoir_about' => ['required'], 
            ]
        );

            if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator); 
        }

        $reservoir = new Reservoir;
        $reservoir->title = $request->reservoir_title; 
        $reservoir->area = $request->reservoir_area; 
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir successfuly created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $validator = Validator::make($request->all(), [
            'reservoir_title' => ['required', 'alpha', 'min:3', 'max:200'],
            'reservoir_area' => ['required', 'numeric'], 
            'reservoir_about' => ['required'], 
            ]
        );
            if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator); 
        }

        $reservoir->title = $request->reservoir_title; 
        $reservoir->area = $request->reservoir_area; 
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir successfuly update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        if($reservoir->reservoirLicences->count()){
            return redirect()->route('reservoir.index')->with('info_message', 'Licences can\'t be taken away, because it is still allowed to fish in this reservoir.');
        }
        $author->delete();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir successfuly deleted.');
    }
}
