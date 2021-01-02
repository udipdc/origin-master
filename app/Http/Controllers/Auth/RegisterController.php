<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
    protected function validator(array $data)
    {
        //dd("user create validation");exit();
        return Validator::make($data, [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'username' => ['required', 'string', 'max:100', 'unique:users,username'],
            //'dob' => ['required', 'string', 'max:100'],
            'phone_number' => ['required'],

            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/',
            'password_confirmation' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/',
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
        //dd("create");exit();
        /*return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'dob' =>  date('Y-m-d', strtotime(str_replace('/', '-', $data['dob']))),
            'password' => Hash::make($data['password']),
        ]);*/

        //$user->syncRoles($request->input('roles'));

        //echo "<pre>"; print_r(User::syncRoles('Nurse'));exit();

        /*$date_format = str_replace('/', '-', $data['dob']);
        $date_store = date('Y-m-d', strtotime($data['dob']));
        dd($data['dob'], $date_format, $date_store);exit();*/

        //dd("create");exit();
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'username' => $data['username'],
            //'dob' =>  date('Y-m-d', strtotime($data['dob'])),
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('name' , 'Nurse')->first();
        $user->syncRoles($role->id);

        //session()->flash('success', 'You Are Register Sucessfully!');
        session()->flash('success', 'You Are Register Successfully.! We Have Sent You One Email On Your Register Email To Verify Your Email Address');
        return $user;
    }
}
