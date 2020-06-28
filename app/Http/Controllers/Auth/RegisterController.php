<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Faker\Provider\Image;
use http\Env\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm() {
        return view('pagesiswa.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => 'required|string|max:255',
            'username' => 'required|max:8|min:6|unique:users',
            'address' => 'required|max:255',
            'phone' => 'required|max:20',
            'dob' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $r = request();
        $file = $r->file('avatar');

        $name = $file->getClientOriginalName();

        $newname = rand(100000 ,  1001238912).".".$name;

        $d = User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'avatar' => $newname,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $file->move('images/avatar' , $newname);

        return $d;
    }
}
