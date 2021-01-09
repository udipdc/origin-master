<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Validator,File,Hash;
use Illuminate\Support\Facades\Redirect;
use App\Rules\MatchOldPassword;
use App\JobApplication;
use App\Notification;

use App\State;
use App\Certification;
use App\Speciality;
use App\Question;
use DataTables;
use Illuminate\Support\Facades\Crypt;

use App\ApplicantReferencesInfo;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    /*edit profile get view*/
    public function editProfile(){
        $data = User::find(Auth::user()->id);
        return view('admin/editProfile')->with('data',$data);
    }

    /*edit profile submit*/
    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $rules = array(
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'username' => 'required|max:100|unique:users,username,' .$id,
            'email' => 'required|email|unique:users,email,' .$id,
            'profile' => 'nullable|mimes:jpeg,jpg,png,gif',
            'dob' => 'required'
        );
        $messages = [
            'firstname.required' => 'Please enter firstname',
            'lastname.required' => 'Please enter lastname',
            'username.required' => 'Please enter username',
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter valid email',
            'profile.mimes' => 'Please select image formats.(jpeg,jpg,png,gif)',
            'dob.required' => 'Please select your date of birth',
        ];
        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                    $user = User::find($id);
                    $user->firstname = $request->firstname;
                    $user->lastname = $request->lastname;
                    $user->username = $request->username;
                    $user->email = $request->email;
                    if($request->has('dob'))
                        $user->dob = date('Y-m-d',strtotime(str_replace('/', '-',$request->dob)));
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
                    $user->updated_by = Auth::user()->id;
                    
                    $user->save();
                
                \DB::commit();
                return redirect('admin/dashboard')->with('success','Profile data has been updated successfully');
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

    /*change password view*/
    public function changePassword(){
        return view('admin/changePassword');
    }

    /*change password submit*/
    public function updatePassword(Request $request){
        $id = Auth::user()->id;
        $rules = array(
            'old_password' => ['required', new MatchOldPassword],
            'password' => ['required','min:8'],
            'password_confirmation' => ['required','min:8','same:password'],
        );
        $messages = [
            'old_password.required' => 'Please enter current password',
            'password.required' => 'Please enter new password',
            'password_confirmation.required' => 'Please confirm password',
            'password_confirmation.confirmed' => 'Password and confirm password must be same',
        ];
        $validator = validator::make($request->all(), $rules,$messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            try {
                \DB::beginTransaction();
                    $user = User::find($id); 
                    $user->password = Hash::make($request->password);               
                    $user->updated_by = Auth::user()->id;
                    $user->save();
                \DB::commit();

                return redirect('admin/dashboard')->with('success','Password has been changed successfully');
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

    public function notificationData()
    {
        $data = array();
        $roleNameCheck = Auth::user()->roles->pluck('name')->toArray();
        $roleName = $roleNameCheck[0];
        $notificationCount=0;
        $notificationData=array();
        $role="";
        if($roleName=="Recruiter")
        {
            //echo "Recruiter";exit();
            $role="Recruiter";
            $notificationCount = Notification::where('requriter_show', '0')->where('requriter_id', Auth::user()->id)->where('deleted_at', NULL)->count();
            $notificationData = Notification::where('requriter_show', '0')->where('requriter_id', Auth::user()->id)->where('deleted_at', NULL)->orderBy('id', 'DESC')->get();
        }
        elseif($roleName=="Admin")
        {
            //echo "Admin";exit();
            $role="Admin";
            $notificationCount = Notification::where('requriter_id', NULL)->where('admin_show', '0')->where('deleted_at', NULL)->count();
            $notificationData = Notification::where('admin_show', '0')->where('requriter_id', NULL)->where('deleted_at', NULL)->orderBy('id', 'DESC')->get();
        }

        $data = $notificationData;
        return response()->json(['count'=>$notificationCount, 'data'=>$notificationData, 'role'=>$role]);
    }

    public function notificationShow($id)
    {
        //dd($id);exit();
        //$id = Crypt::decryptString($id);
        //dd($id);exit();
    }

    public function notificationList(Request $request)
    {
        //dd("all notification list.");exit();
        return view('admin.notificationList');
    }

    public function notificationAll(Request $request)
    {
        $data = array();
        $roleNameCheck = Auth::user()->roles->pluck('name')->toArray();
        $roleName = $roleNameCheck[0];
        if($roleName=="Recruiter")
        {
            $notificationData = Notification::where('requriter_id', Auth::user()->id)->where('deleted_at', NULL)->orderBy('id', 'DESC')->get();
        }
        elseif($roleName=="Admin")
        {
            $notificationData = Notification::where('requriter_id', NULL)->where('deleted_at', NULL)->orderBy('id', 'DESC')->get();
        }
        //echo "<pre>"; print_r($notificationData);exit();

        return Datatables::of($notificationData)->addIndexColumn()
        ->addColumn('type', function ($row)
        {
            return $row->type_notification;
        })
        ->addColumn('message', function ($row)
        {
            return $row->message;
        })
        ->addColumn('notify_date', function ($row)
        {
            return date('m/d/yy h:m', strtotime($row->created_at));
        })
        ->addColumn('action', function ($row) use($request)
        {
            $btn = '';
            if($row->type_notification=="complete_jobApplication")
            {
                //var_dump($row->JobApplication->email);exit();
                if(isset($row->JobApplication->email))
                {
                    $btn .= '<a href="' . route('jobApplication.edit', Crypt::encryptString($row->JobApplication->email)) . '" data-toggle="tooltip" data-placement="top" title="Edit" class="edit"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                }
            }
            return $btn;
        })->rawColumns(['name', 'action'])
            ->make(true);

    }

}
