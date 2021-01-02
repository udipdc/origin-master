<?php

namespace App\Http\Controllers;
use DataTables,Validator,File,Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
Use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\JobApplication;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.add_edit',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'username' => 'required|max:100|unique:users,username',
            //'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'profile' => 'nullable|mimes:jpeg,jpg,png,gif',
        );
        $messages = [
            'firstname.required' => 'Please enter firstname',
            'lastname.required' => 'Please enter lastname',
            'username.required' => 'Please enter username',
            //'password.required' => 'Please enter password',           
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter valid email',
            'profile.mimes' => 'Please select image formats.(jpeg,jpg,png,gif)',
        ];
        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                $image_name ="";
                    if($request->has('dob'))
                   if ($request->dob !="") {
                       $dob = date('Y-m-d', strtotime(str_replace('/', '-', $request->dob)));
                   }else{
                       $dob =null;
                   }
                    if($request->file('profile')){
                    	$originalPath = public_path('images/users/');
                        $image = $request->profile;
                        $image_name = uploadImage($image,$originalPath);       
                    }
                    
                    $user = User::create([
                        'firstname' => $request->get('firstname') ,
                        'lastname' => $request->get('lastname') ,
                        'email' => $request->get('email') ,
                        'username' => $request->get('username') ,
                        //'password' => Hash::make($request->get('password')) ,
                        'dob' => $dob,
                        'profile' => $image_name,
                        'created_by' => Auth::user()->id,
                    ]);

                    $user->syncRoles($request->input('roles'));

                \DB::commit();
                return redirect('admin/user')->with('success','User data has been added successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $msg = $ex->getMessage();
                if(isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                }
                \DB::rollback();
                return Redirect::back()->with('error',$msg);
            }  catch (Exception $ex) {
                $msg = $ex->getMessage();
                \DB::rollback();
                return Redirect::back()->with('error',$msg);
            }
        }
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
        $user = User::find($id);
        $roles = Role::get();
        return view('admin.user.add_edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
    
        $id = Auth::user()->id;
        $rules = array(
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'username' => 'required|max:100|unique:users,username,' .$user_id,
            'email' => 'required|email|unique:users,email,' .$user_id,
            'profile' => 'nullable|mimes:jpeg,jpg,png,gif',
        );
        $messages = [
            'firstname.required' => 'Please enter firstname',
            'lastname.required' => 'Please enter lastname',
            'username.required' => 'Please enter username',
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter valid email',
            'profile.mimes' => 'Please select image formats.(jpeg,jpg,png,gif)',
        ];
        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                    $user = User::find($user_id);
                    $user->firstname = $request->firstname;
                    $user->lastname = $request->lastname;
                    $user->username = $request->username;
                    $user->email = $request->email;
                    if($request->has('dob'))
                        
                    if ($request->dob !="") {
                        $dob = date('Y-m-d', strtotime(str_replace('/', '-', $request->dob)));
                    }else{
                        $dob =null;
                    }

                    if($request->file('profile')){
                    	$originalPath = public_path('images/users/');
                        if($request->old_img != null || $request->old_img != ''){
                            $old_img = public_path('images/users').'/'.$request->old_img;
                            if (File::exists($old_img)) { 
                                unlink($old_img);
                            }
                        }
                        $image = $request->profile;
                        $image_name = uploadImage($image,$originalPath);
                        $user->profile = $image_name;
                    }else{
                        if($request->old_img == null || $request->old_img == ''){
                            if ($user->profile!= null) {
                                $oldImage = public_path('images/users').'/'.$user->profile;
                                if (File::exists($oldImage)) { 
                                    unlink($oldImage);
                                }
                                $user->profile = null;
                            }
                        }
                    }
                    $user->dob = $dob;
                    $user->updated_by = Auth::user()->id;
                    $user->updated_at = date('Y-m-d h:i:sa');
                    $user->save();
                    $user->syncRoles($request->input('roles'));
                
                \DB::commit();
                return redirect('admin/user')->with('success','User data has been updated successfully');
            } catch(\Illuminate\Database\QueryException $ex){ 
                $msg = $ex->getMessage();
                if(isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                }
                \DB::rollback();
                return Redirect::back()->with('error',$msg);
            }  catch (Exception $ex) {
                $msg = $ex->getMessage();
                \DB::rollback();
                return Redirect::back()->with('error',$msg);
            }
        }


    }

    public function delete()
    {
        $id = $_POST['id'];
        $user = User::find($id);
        $user->delete();

    }

    public function status_change()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $user = User::find($id);
        $user->status = $status;
        $user->save();

    }


    public function getuser(Request $request)
    {

        // $limit = $request->input('length');
        // $start = $request->input('start');
        if ($request->input('status') != "")
        {
            $data = User::where('status', '=', $request->input('status'))
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        else
        {
            $data = User::orderBy('updated_at', 'DESC')
                ->get();
        }

        return Datatables::of($data)->addIndexColumn()->addColumn('firstname', function ($row)
        {
            return $row->firstname;
        })
        ->addColumn('lastname', function ($row)
        {
            return $row->lastname;
        })
        ->addColumn('email', function ($row)
        {
            return $row->email;
        })
        ->addColumn('username', function ($row)
        {
            return $row->username;
        })
        ->addColumn('status', function ($row)
        {
            $check = ($row->status == 1) ? 'checked' : "";
            $btn = '<input id="chk_' . $row->id . '" onchange="statuschange(' . $row->id . ')" ' . $check . ' type="checkbox">';
            return $btn;
        })->addColumn('action', function ($row) use($request)
        {
            $btn = '';
            if($request->user()->can('edit_User')){
            $btn .= '<a href="' . route('user.edit', $row->id) . '" class="edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
            }
            if($request->user()->can('delete_User')){
                $btn .= ' <a href="javascript:void(0);" onclick="deleteuser(' . $row->id . ')" class="edit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>';
            }
            return $btn;
        })->rawColumns(['firstname', 'lastname', 'email','username','status','action'])
            ->make(true);

    }


    public function setPassword(Request $request, $id)
    {
        //dd(Crypt::decryptString($id));exit;
        $userData = User::where('id', Crypt::decryptString($id))->where('deleted_at',NULL)->first();
        if($userData->password==NULL)
        {
            $userID = Crypt::decryptString($id);
            //$user_data = User::select('id, email')->where('id',$id)->where('deleted_at',NULL)->first();
            $user_data = User::where('id',$userID)->where('deleted_at',NULL)->first();
            //$userID = Crypt::encryptString($id);
            //dd($userID);exit;
            return view('admin.user.setPassword',compact('user_data','userID'));
        }
        else
        {
            //dd("already set password.");exit;

            // Get the session key for this user
            $sessionKey = Auth::guard('admin')->getName();
            //dd(Auth::guard('admin'));exit;

            // Logout current user by guard
            Auth::guard('admin')->logout();

            // Delete single session key (just for this user)
            $request->session()->forget($sessionKey);

            //return redirect()->route('admin.login')->with('error','You have set password already');
            return redirect()->route('admin.login')->with('error','You have already set your password. please login with your credential');
        }
    }

    public function insertPassword(Request $request, $id)
    {
        $userID = Crypt::decryptString($id);
        //dd(Crypt::decryptString($id));exit;
        //dd($userID);exit;
        $rules = array(
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/',
            'password_confirmation' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/',
        );
        $messages = [
            'password.required' => 'Please enter password',
            'password.confirmed' => 'Please enter password and confirm password not metch',
            'password.min' => 'Please Password must be minimum 8 character',
            'password.regex' => 'Please Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long',
            'password_confirmation.required' => 'Please enter confirm password',
            'password_confirmation.min' => 'Please confirm password must be minimum 8 character',
            'password_confirmation.regex' => 'Please confirm password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long',
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            $user = User::find($userID);
            $user->password = Hash::make($request->get('password'));
            $user->save();

            //if(Auth::guard('admin')->attempt(['email' => $user->email, 'password' => $request->get('password')]))
            if(Auth::guard('admin')->attempt(['username' => $user->username, 'password' => $request->get('password'), 'status' => 1]))
            {
                //dd("admin");exit;
                //dd(Auth::guard('admin')->check());exit;
                return redirect('admin/dashboard')->with('success','Password has been set successfully');
            }
        }
    }

}
