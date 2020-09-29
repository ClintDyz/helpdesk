<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChemMicroAnalysis;
class ChemmicroAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analysis = ChemMicroAnalysis::all();

        return view('chemmicro.analysis.index', compact('analysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chemmicro.analysis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'authorized' => 'required|max:255',
            'analysis_type' => 'required|max:255',
            'sample' => 'required|max:255',
            'param_test' => 'required|max:255',
            'test_method' => 'required|max:255',
            'fee' => 'required|max:255',
            'info' => 'string',

        ]);
        $analysis = ChemMicroAnalysis::create($validatedData);

        return redirect('/analysis')->with('success', 'Chem Micro Analysis is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analysis  = ChemMicroAnalysis::findOrFail($id);

        return view('chemmicro.analysis.edit', compact('analysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'authorized' => 'required|max:255',
            'analysis_type' => 'required|max:255',
            'sample' => 'required|max:255',
            'param_test' => 'required|max:255',
            'test_method' => 'required|max:255',
            'fee' => 'required|max:255',
            'info' => 'string',

        ]);
        ChemMicroAnalysis::whereId($id)->update($validatedData);

        return redirect('/analysis')->with('success', 'Chem Micro Analysis is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analysis  = ChemMicroAnalysis::findOrFail($id);
        $analysis->delete();

        return redirect('/analysis')->with('success', 'Chem Micro Analysis is successfully deleted');
    }
}
