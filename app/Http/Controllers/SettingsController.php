<?php

namespace App\Http\Controllers;
use App\Setting;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();

        return view('settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
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
            'agency_name' => 'required|max:255',
            'abbrev' => 'string',
            'logo' => 'string',
            'address' => 'string',
            'contact_no' => 'string',
            'website' => 'string',
            'email' => 'string',
            'background' => 'string',
            'vision' => 'string',
            'mandate' => 'string',
            'mission' => 'string',



        ]);
        $settings = Setting::create($validatedData);

        return redirect('/settings')->with('success', 'Configuration is successfully saved');
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
        $settings  = Setting::findOrFail($id);

        return view('settings.edit', compact('settings'));
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
            'agency_name' => 'required|max:255',
            'abbrev' => 'string',
            'logo' => '',
            'address' => 'string',
            'contact_no' => 'string',
            'website' => 'string',
            'email' => 'string',
            'background' => '',
            'vision' => 'string',
            'mandate' => 'string',
            'mission' => 'string',

        ]);
        Setting::whereId($id)->update($validatedData);

        return redirect('/settings')->with('success', 'Configuration is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $settings  = Setting::findOrFail($id);
        $settings->delete();

        return redirect('/settings')->with('success', 'Configuration is successfully deleted');
    }
}
