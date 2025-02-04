<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SendCarrerEmailRequest;
use App\Mail\sendCareerApplyMail;
use App\Mail\sendThankYouMail;
use App\Models\SendCareerEmail;
use App\Models\AboutCareer;
use App\Models\Career;
use App\Models\JobPosition;
use App\Models\JobPositionDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareersController extends Controller
{
    public function careers()
    {
        // Fetch Careers
        $careers = Career::orderBy("id", "desc")->whereNull('deleted_at')->first();

        // Fetch About Careers
        $aboutcareers = AboutCareer::orderBy("id", "desc")->whereNull('deleted_at')->first();
        $aboutcareers->short_description = $aboutcareers->short_description ? json_decode($aboutcareers->short_description, true) : [];

        // Fetch Job Positions
        $job_positions = JobPosition::orderBy("id", "desc")->whereNull('deleted_at')->get();

        // Fetch Job Position Details and decode JSON fields
        $jobpositiondetails = JobPositionDetails::with('job_position')
                                ->orderBy("id", "asc")
                                ->whereNull('deleted_at')
                                ->get();

        foreach ($jobpositiondetails as $detail) {
            $detail->requirements = !empty($detail->requirements) ? json_decode($detail->requirements, true) : [];
            $detail->qualification = !empty($detail->qualification) ? json_decode($detail->qualification, true) : [];
            $detail->responsibilities = !empty($detail->responsibilities) ? json_decode($detail->responsibilities, true) : [];
            $detail->salary = !empty($detail->salary) ? json_decode($detail->salary, true) : [];
        }

        // dd($jobpositiondetails);

        return view('frontend.careers', [
            'careers' => $careers,
            'aboutcareers' => $aboutcareers,
            'job_positions' => $job_positions,
            'jobpositiondetails' => $jobpositiondetails,
        ]);
    }

    // ====== sendCareerEmail ======
    public function sendCareerEmail(SendCarrerEmailRequest $request)
    {
        $request->validated();

        try {

            $sendCareerEmail = new SendCareerEmail();

            // ==== Upload (resume)
            if ($request->hasFile('resume')) {
                $image = $request->file('resume');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/send_carrer_email/resume/'), $new_name);

                $resume_image_path = "/damian_corporate/send_carrer_email/resume/" . $new_name;

                $sendCareerEmail->resume = $new_name;
            }

            // ==== Upload (portfolio)
            if ($request->hasFile('portfolio')) {
                $image = $request->file('portfolio');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/send_carrer_email/portfolio/'), $new_name);

                $portfolio_image_path = "/damian_corporate/send_carrer_email/portfolio/" . $new_name;

                $sendCareerEmail->portfolio = $new_name;
            }

            $sendCareerEmail->name = $request->name;
            $sendCareerEmail->address = $request->address;
            $sendCareerEmail->email = $request->email;
            $sendCareerEmail->phone = $request->phone;
            $sendCareerEmail->job_position_id = $request->job_position_id;
            $sendCareerEmail->experience = $request->experience;
            $sendCareerEmail->messege = $request->messege;
            $sendCareerEmail->save();

            $update = [
                'inserted_by' => $sendCareerEmail->id,
                'inserted_at' => Carbon::now()
            ];

            SendCareerEmail::where('id', $sendCareerEmail->id)->update($update);

            // ==== Fetch Job Position
            $job_position = JobPosition::where('id', $sendCareerEmail->job_position_id)->first();
            // dd($job_position);
            // ==== Fetch Job Position
            $job_position_name = $job_position->job_title;
            // dd($job_position_name);

            // Send Mail
            $mailData = [
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'job_position' => $job_position_name,
                'experience' => $request->experience,
                'message' => $request->message,
            ];

            // Get the resume and portfolio paths
            $resumePath = public_path('/damian_corporate/send_carrer_email/resume/' . $sendCareerEmail->resume);
            $portfolioPath = public_path('/damian_corporate/send_carrer_email/portfolio/' . $sendCareerEmail->portfolio);

            // Send Mail with attachments
            Mail::to('careers@damiancorporate.com', 'Damian Corporate')
                // ->cc(['shweta@matrixbricks.com'])
                ->send(new sendCareerApplyMail($mailData, $resumePath, $portfolioPath));

            // Send Thank You Mail to User
            $mailData = [
                'name' => $request->name,
                'job_position' => $job_position_name,
            ];

            Mail::to($request->email, $request->name)
                ->send(new sendThankYouMail($mailData));

            return redirect()->route('frontend.thank-you-careers')->with('message','Thank you for your interest. We will get back to you within 24 hours.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    // ==== Thank You Mail For Careers
    public function thankYouCareers()
    {
        return view('frontend.thankyou-careers');
    }
}
