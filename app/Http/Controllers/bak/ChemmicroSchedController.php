<?php

namespace App\Http\Controllers;
use App\ChemMicroSched;
use Illuminate\Http\Request;

class ChemmicroSchedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sched = ChemMicroSched::all();

        return view('chemmicro.sched.index', compact('sched'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chemmicro.sched.create');
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
            'sample_accept' => 'required|max:255',
            'remarks' => 'required|max:255',
            'tel_no' => 'required|max:255',
            'telefax' => 'required|max:255',
            'mobile_no' => 'required|max:255',
            'email'=>  'email', 'max:255',



        ]);
        $sched = ChemMicroSched::create($validatedData);

        return redirect('/schedule')->with('success', 'Analysis Schedule is successfully saved');
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
        $sched  = ChemMicroSched::findOrFail($id);

        return view('chemmicro.sched.edit', compact('sched'));
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
            'sample_accept' => 'required|max:255',
            'remarks' => 'required|max:255',
            'tel_no' => 'required|max:255',
            'telefax' => 'required|max:255',
            'mobile_no' => 'required|max:255',
            'email'=>  'email', 'max:255',


        ]);
        ChemMicroSched::whereId($id)->update($validatedData);

        return redirect('/schedule')->with('success', 'Analysis Schedule is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sched  = ChemMicroSched::findOrFail($id);
        $sched->delete();

        return redirect('/schedule')->with('success', 'Analysis Schedule is successfully deleted');
    }
}
