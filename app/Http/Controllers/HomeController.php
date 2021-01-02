<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Certification;
use App\Speciality;
use App\JobApplication;
use App\Question;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Auth;
Use App\User;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($authKey='')
    {
        //dd($authKey);exit();


        //dd(Auth::user()!=null);exit();
        /*start authentication check.*/
        if(Auth::user()!=null || Auth::user()!="")
        {
            //dd("login user.");exit();
            $jobData = JobApplication::where('email', Auth::user()->email)->first();
            //dd($jobData);exit();

            if(!empty($jobData))
            {
                $authKey = Crypt::encryptString($jobData->email);
            }
        }
        else
        {
            //dd("without login user.");exit();
        }
        /*end authentication check.*/
        //dd($authKey);exit();


        $recruiter_email = "";
        $recruiter_id = "";
        $jobData = '';
        if(!empty($authKey)){
            $email = Crypt::decryptString($authKey);
            $jobData = JobApplication::where('email',$email)->first();
            if(!empty($jobData->sign_person) && !empty($jobData->sign_date)){
                $msg = "You have already submited your job application at MedicalStore.";
                return redirect('thankyou')->with(['msg' => $msg]); 
            }
            $recruiter_email = $email;
            if(isset($recruiter_email) || !empty($recruiter_email))
            {
                /*start check this application are create requirement.*/
                    $require_data = User::where('email', $recruiter_email)->first();
                    $recruiter_id = $require_data->id;
                /*end check this application are create requirement.*/
            }
        }
        //echo "<pre>"; print_r($recruiter_email);exit();

        $states = State::get();
        $certifications = Certification::where('status',1)->get();
        $specialities = Speciality::where('status',1)->get();
        $questions = Question::where('status',1)->get();
        return view('index')->with(['states' => $states,'jobData' => $jobData,'certifications' => $certifications,'specialities' => $specialities,'questions' => $questions, 'recruiter_email'=>$recruiter_email, 'recruiter_id'=>$recruiter_id]);
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function ApplicationSuccess()
    {
        if(Auth::user()!=null || Auth::user()!="")
        {
            //dd("login.");
            //return view('thankyou');

            $msg = "You have already submited your job application at MedicalStore.";
            return redirect('thankyou')->with(['msg' => $msg]);
        }
        else
        {
            //dd("without login.");
            return view('thankyou_withoutRegister');
        }
    }

    public function welcomeData(Request $request)
    {
        //dd("welcomeData");

        $productList = Product::latest()->orderBy('updated_at', 'DESC')->get();
        return view('welcome')->with(['productList' => $productList]);
    }

}
