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
        $users = User::with(['empdivision', 'empunit'])->orderBy('firstname')
                     ->paginate(15);
        return view('auth.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $divisions = $this->getUserData($id)->divisions;
        $units = $this->getUserData($id)->units;
        $user = $this->getUserData($id)->user;
        return view('auth.profile', compact('id', 'user', 'divisions', 'units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $divisions = $this->getUserData($id)->divisions;
        $units = $this->getUserData($id)->units;
        $user = $this->getUserData($id)->user;
        return view('auth.update', compact('id', 'user', 'divisions', 'units'));
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
        $role = $request->role;
        $isActive = $request->is_active;
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

            if ($role) {
                $user->role = $role;
            }

            if ($isActive) {
                $user->is_active = $isActive;
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

    private function getUserData($id) {
        return (object) [
            'user' => User::find($id),
            'divisions' => UserDivision::orderBy('name')->get(),
            'units' => UserUnit::orderBy('name')->get()
        ];
    }
}
