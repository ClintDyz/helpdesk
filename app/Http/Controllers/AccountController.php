<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserDivision;
use App\UserUnit;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        $divisions = UserDivision::with(['division', 'unit'])->orderBy('firstname')->get();
        return view('auth.index', compact('users', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        $divisions = UserDivision::orderBy('name')->get();
        $units = UserUnit::orderBy('name')->get();
        return view('auth.profile', compact('id', 'user', 'divisions', 'units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $firstname = $request->firstname;
        $middlename = $request->middlename;
        $lastname = $request->lastname;
        $position = $request->position;
        $division = $request->division_id;
        $unit = $request->unit;
        $mobileNo = $request->mobile_no;
        $email = $request->email;
        $username = $request->username;
        $password = $request->password;
        $confirmPassword = $request->confirm_password;

        try {
            $user = User::find($id);
            $user->firstname = $firstname;
            $user->middlename = $middlename;
            $user->lastname = $lastname;
            $user->position = $position;
            $user->division = $division;
            $user->unit = $unit;
            $user->mobile_no = $mobileNo;
            $user->email = $email;
            $user->username = $username;

            if ($password) {
                if ($password == $confirmPassword) {
                    $user->password = $password;
                } else {
                    $msg = "Password doesn't match the confirm password.";
                    return redirect()->back()->with('success', $msg);
                }
            }

            $user->save();

            $msg = 'Profile is successfully updated.';
            return redirect()->back()->with('success', $msg);
        } catch (\Throwable $th) {
            $msg = 'Profile is successfully updated.';
            return redirect()->back()->with('failed', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
