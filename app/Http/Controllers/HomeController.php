<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;
use App\Company;
use App\Service;
use App\Slider;
use App\Customer;
use App\Faq;
use App\QuoteLog;
use App\Testimonial;
use Hash;
use DB;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $company = Company::first();
        return view("front.index", compact("company"));
    }

    public function about()
    {
        $company = Company::first();
        $testimonials = Testimonial::get();
        return view("front.about", compact("testimonials", "company"));
    }

    public function faq()
    {
        $company = Company::first();
        $faq = Faq::get();
        return view("front.faq", compact("faq", "company"));
    }

    public function contact()
    {
        $company = Company::first();
        return view("front.contact", compact("company"));
    }

    public function whyus()
    {
        $company = Company::first();
        return view("front.whyus", compact("company"));
    }

    public function services()
    {
        $users = Customer::whereNotNull('schedule')->get();
        return view("front.services", compact("users"));
    }

    public function search(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $service = $request->service;
        $address = $request->address;
        $users = DB::select("select c.*,111.111 * DEGREES(ACOS(LEAST(1.0, COS(RADIANS(c.Latitude)) * COS(RADIANS($latitude)) * COS(RADIANS(c.Longitude - $longitude)) + SIN(RADIANS(c.Latitude)) * SIN(RADIANS($latitude))))) AS distance_in_km from customers c where service=$service and schedule is not null HAVING distance_in_km < 5 ORDER BY distance_in_km DESC");
        $data = [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'service' => $service,
            'address' => $address,
            'users' => $users,
        ];
        return view("front.services", $data);
    }

    public function servicedetail($id)
    {
        $service = Service::find($id);
        return view("front.servicedetail", compact("service"));
    }

    public function quote()
    {
        $model = new Inquiry;
        $column = $model->getFillable();
        return view("front.quote", compact("column"));
    }

    public function quotesubmit(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        if (!is_null($customer)) {
            $customer_id = $customer->id;
        } else {
            $customer = new Customer;
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();
            $customer_id = $customer->id;
        }
        $invoice = new Inquiry;
        $invoice->first_name = $request->first_name;
        $invoice->last_name = $request->last_name;
        $invoice->email = $request->email;
        $invoice->phone = $request->phone;
        $invoice->cargo_type = $request->cargo;
        $invoice->address = $request->address;
        $invoice->house = $request->house;
        $invoice->promo_code = $_POST['promo_code'];
        $invoice->subdivision = $request->subdivision;
        $invoice->province = $request->province;
        $invoice->munipacility = $request->munipacility;
        $invoice->zip_code = $request->zip_code;
        $invoice->item_desc = $request->item_desc;
        $invoice->qty = $request->qty;
        $invoice->cbm = $request->cbm;
        $invoice->kgs = $request->kgs;
        $invoice->no_box = $request->no_box;
        $invoice->freight_cost = $request->freight_cost;
        $invoice->deliver_to = $request->deliver_to;
        $invoice->pickup = $request->pickup;
        $invoice->dropoff = $request->dropoff;
        $invoice->local_cost = $request->local_cost;
        $invoice->status = "Booking Created";
        $invoice->customer_id = $customer_id;
        if ($invoice->save()) {
            $id = $invoice->id;
            $log = new QuoteLog;
            $log->inquire_id = $id;
            $log->status = "Booking Created";
            $log->date = date("Y-m-d");
            $log->save();
            $invoice_no = "Freight21PH-" . sprintf("%04d", $id);
            DB::update("update inquiries set invoice_no='$invoice_no' where id=$id");
            $invoice_new = Inquiry::find($id);
            $this->quote_email($request->email, $invoice_new);

            echo "Booking Submitted Successfully\r\nYour Shipment ID is " . $invoice_no . ". Keep it to check your status";
            // return redirect()->back()->with("success","Booking Submitted Successfully\r\nYour Shipment ID is ".$invoice_no.". Keep it to check your status");
        }
    }

    public function invoice(Request $request)
    {
        $invoice = Inquiry::where("invoice_no", $request->invoice_no)->where('first_name', 'like', '%' . $request->surname . '%')->first();

        if (is_null($invoice)) {
            return back()->with('error', "No Quotation Found");
        }
        return view("front.invoice", compact("invoice"));
    }

    public function contactsubmit(Request $request)
    {
        $company = Company::get()->first();

        $to = $company->email;
        $from  = $company->email;

        $subject = "CONTACT REQUEST";
        $message = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
        </head>
        <body>
            <div class='container body'>
                <h4>CONTACT REQUEST</h4>
                <br>
                Name : $request->name<br>
                Email : $request->email<br>
                Phone : $request->phone<br>
                <br>
                Message: <br>$request->message
            </div>
        </body>
        </html>
        ";

        $headers = "From: $from";
        // boundary
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= "To: $to, .";


        $ok = @mail($to, $subject, $message, $headers, "-f " . $from);
        return redirect()->back()->with('success', 'Contact Form Submitted Successfully');
    }

    public function login()
    {
        return view("front.login");
    }

    public function loginsubmit(Request $request)
    {
        if (Auth::guard('customer')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            $customer = Auth::guard('customer')->user();
            return redirect()->route('index');
        } else {
            return redirect()->route('customerlogin')
                ->with('loginerror', 'Ooops! Invalid Email or Password')
                ->withInput();
        }
    }

    public function customerlogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customerlogin');
    }

    public function registersubmit(Request $request)
    {
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->service = $request->service;
        $customer->type = $request->type;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bio = $request->bio;
        $customer->address = $request->address;
        $customer->latitude = $request->latitude;
        $customer->longitude = $request->longitude;
        $customer->pin = $request->password;
        $customer->password = Hash::make($request->password);
        $customer->status = 1;
        $customer->save();
        return back()->with("success", "Customer Registration Completed");
    }

    public function profile()
    {
        return view('front.customer.profile');
    }

    public function schedule()
    {
        return view('front.customer.schedule');
    }

    public function dashboard()
    {
        return view('front.customer.dashboard');
    }

    public function profile_submit(Request $request)
    {
        $customer = Customer::find(Auth::guard('customer')->user()->id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bio = $request->bio;
        $customer->address = $request->address;
        $customer->latitude = $request->latitude;
        $customer->longitude = $request->longitude;
        $customer->pin = $request->password;
        $customer->password = Hash::make($request->password);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs("customer/", $fileNameToStore);
            $customer->image = "storage/customer/" . $fileNameToStore;
        }

        $customer->save();
        return back()->with("success", "Customer Profile Updated");
    }

    public function schedule_submit(Request $request)
    {
        $week_array = [];
        foreach ($request->day as $key => $day) {
            $start_time = $request->start_time[$key];
            $end_time = $request->end_time[$key];
            if (!is_null($start_time)) {
                if ($end_time < $start_time) {
                    return back()->with("error", $day . " Start Time is less than End time");
                } else {
                    $week_array[$day]['start_time'] = $start_time;
                    $week_array[$day]['end_time'] = $end_time;
                }
            }
        }
        $schedule = serialize($week_array);
        $customer = Customer::find(Auth::guard('customer')->user()->id);
        $customer->schedule = $schedule;
        $customer->save();
        return back()->with("success", "Customer Schedule Updated");
    }

    public function calculator()
    {
        $title = "Calculator";
        return view('front.calculator', compact("title"));
    }
}
