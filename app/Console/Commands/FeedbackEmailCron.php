<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ApplicantReferencesInfo;
use App\ReferencesSendEmail;
use Carbon\Carbon;

use App\Jobs\SendRemainderFeedbackEmailJob;
use Illuminate\Support\Facades\Redirect;

class FeedbackEmailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feedbackEmail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        \Log::info("Cron is working fine!");
            $Applicantdata = ApplicantReferencesInfo::where('is_approved', '1')->where('is_feedback_form_submited', '0')->get();

            foreach($Applicantdata as $key => $value)
            {

                /*start references created 48hours lessthan condition check.*/
                    $newDate = Carbon::parse($value->approved_reference_date)->addHours(48);
                    //echo $value->created_at."<br>".$newDate;exit();
                    if($newDate >= date('Y-m-d h:i:s'))
                    {
                        if($newDate >= $value->approved_reference_date)
                        {
                            //echo "smallDate.";
                            /*start email count lessthan 2 condition check.*/
                                //echo $value->remainder_email_count+1;exit();
                                if($value->remainder_email_count<=1)
                                {
                                    $updateEmailcount = ApplicantReferencesInfo::where('id', $value->id)->where('job_app_id', $value->job_app_id)->update([
                                        'remainder_email_count' => $value->remainder_email_count+1
                                    ]);

                                    $references_email = ReferencesSendEmail::create([
                                        'job_app_id' => $value->job_app_id,
                                        'reference_email' => $value->ref_email,
                                        'email_created_at' => date('Y-m-d h:i:s'),
                                        'reference_id' => $value->id,
                                    ]);

                                    /*start send remainder email for feedback job queue.*/
                                        $mailData = array();
                                        $mailData['email'] = $value->ref_email;
                                        $mailData['link'] = $value->feedback_form_token;
                                        $mailData['ref_name'] = $value->ref_name;
                                        $mailData['subject'] = "Remainder For Submit References Feedback Form.";

                                        //echo "<pre>"; print_r($mailData);exit();
                                        //$mailData,$email,$link,$ref_name,$subject

                                        SendRemainderFeedbackEmailJob::dispatch($mailData)->delay(now()->addMinutes(1));
                                    /*end send remainder email for feedback job queue.*/

                                }
                            /*end email count lessthan 2 condition check.*/
                        }
                    }
                    //exit;
                /*end references created 48hours lessthan condition check.*/

            }
        $this->info('FeedbackEmail:Cron Cummand Run successfully!');
    }
}
