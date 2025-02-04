<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SendContactEmailRequest;
use App\Mail\sendContactMail;
use App\Mail\sendContactUsThankYouMail;
use App\Models\CompanyInformation;
use App\Models\SendContactEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contact()
    {
        $company_informations = CompanyInformation::orderBy("id", "desc")->whereNull('deleted_at')->first();

        // Decode JSON data and fetch the first element
        $location_name = json_decode($company_informations->location_name ?? '[]', true);
        $first_location_name = $location_name[0] ?? '';

        $company_address = json_decode($company_informations->company_address ?? '[]', true);
        $first_company_address = $company_address[0] ?? '';

        $location_link = json_decode($company_informations->location_link ?? '[]', true);
        $first_location_link = $location_link[0] ?? '';

        return view('frontend.contact', [
            'company_informations' => $company_informations,
            'location_name' => $first_location_name,
            'company_address' => $first_company_address,
            'location_link' => $first_location_link,
        ]);
    }


    public function sendContactEmail(SendContactEmailRequest $request)
    {
        $request->validated();

        try {

            $sendContactEmail = new SendContactEmail();

            $sendContactEmail->name = $request->name;
            $sendContactEmail->email = $request->email;
            $sendContactEmail->phone = $request->phone;
            $sendContactEmail->address = $request->address;
            $sendContactEmail->message = $request->messege;
            $sendContactEmail->save();

            $update = [
                'inserted_by' => $sendContactEmail->id,
                'inserted_at' => Carbon::now()
            ];

            SendContactEmail::where('id', $sendContactEmail->id)->update($update);

            // Send Mail
            $mailData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'message' => $request->messege,
            ];

            // Send Mail contact@damiancorporate.com
            Mail::to('contact@damiancorporate.com', 'Damian Corporate')
                ->cc(['shweta@matrixbricks.com'])
                ->send(new sendContactMail($mailData));

            // Send Thank You Mail to User
            Mail::to($request->email, $request->name)
                ->send(new sendContactUsThankYouMail($mailData));

            return redirect()->route('frontend.thank-you-contact')->with('message','Thank you for your interest. We will get back to you within 24 hours.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }


    // ==== Thank You Mail For Careers
    public function thankYouContact(Request $request)
    {
        return view('frontend.thank-you-contact');
    }

}
