<?php

namespace App\Http\Controllers;
use App\UserUnit;
use App\UserDivision;
use Illuminate\Http\Request;
use DB;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $units = UserUnit::with('userDivision')->orderBy('name')
                         ->paginate(15);
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = UserDivision::get();

        return view('units.create',compact('divisions'));
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
            'name' => 'required|max:255',
            'division' => 'required|max:255',
        ]);
        $units = UserUnit::create($validatedData);

        return redirect('/units')->with('success', 'unit is successfully saved');
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


        $units = UserUnit::findOrFail($id);
        $divisions = UserDivision::get();

        return view('units.edit', compact('units','divisions'));
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
            'name' => 'required|max:255',
            'division' => 'required|max:255',
        ]);
        UserUnit::whereId($id)->update($validatedData);

        return redirect('/units')->with('success', 'Unit is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $units = UserUnit::findOrFail($id);
        $units->delete();

        return redirect('/units')->with('success', 'Unit is successfully deleted');
    }

    public function getDivision(){
        $divisions = UserDivision::get();
        return view('units.create', [
            'divisions' => $divisions
        ]);
    }

    public function getUnits($divisionID){
        $units = UserUnit::where('division', $divisionID)->get();
        return response()->json($units);
    }
}
