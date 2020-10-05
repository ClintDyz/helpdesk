<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserDivision;
use App\UserUnit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'division' => ['required', 'integer', 'max:255'],
            'unit' => ['required', 'integer', 'max:255'],
            'mobile_no' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cc_users'],
            'username' => ['required', 'string', 'max:255', 'unique:cc_users'],
            //'role' => ['required', 'string', 'max:255'],
            //'is_active' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        return User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'position' => $data['position'],
            'division' => $data['division'],
            'unit' => $data['unit'],
            'mobile_no' => $data['mobile_no'],
            'email' => $data['email'],
            'username' => $data['username'],
            'role' => isset($data['role']) ? $data['role'] : 'employee',
            'is_active' => isset($data['is_active']) ? $data['is_active'] : 'n',
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm() {
        $divisions = UserDivision::get();
        return view('auth.register', [
            'divisions' => $divisions

        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $msg = 'Please contact your administrator for your account activation.';
        $request->session()->flash('success', $msg);

        return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
    }

    public function getUnits($divisionID){
        $units = UserUnit::where('division', $divisionID)->get();
        return response()->json($units);
    }
}
