<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\DB;
Use App\Models\Companies;
Use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;



class CompanyController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }
    
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $email = $request->email;
            $user = Companies::where('email', $email)->first();
            $verify = $user -> is_verified;
            if($verify !=1){
                // return redirect()->back()->with(session()->flash('alert-danger', 'Your Account has not been verified. '));
                return response()->json([
                    "message"=>"Please verify account"
                ], 404);
            }
            // return redirect()->intended('dashboard');
            return response()->json([
                "message"=>"user logged in successfully"
            ], 200);
        }
        return response()->json([
            "message"=>"Please verify account"
        ], 404);
        // return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {   

    // Validate the value...
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
                'ownership' => 'required',
            'businessowner' => 'required',
            'companysize' => 'required',
            'contactp' => 'required',
            'telephone' => 'required',
            'regno' => 'required',
            'bname' => 'required',
            'btel' => 'required',
            'input_30' => 'required',
            'input_33' => 'required',
            'input_34' => 'required',
            'input_35' => 'required',
            'address' => 'required',
            'paddress' => 'required',
            'district' => 'required',
            'tax_id_number' => 'required',
        ]);
        $user = new Companies();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->ownership = $request->ownership;
        $user->owners = $request->businessowner;
        $user->companysize = $request->companysize;
        $user->contactperson = $request->contactp;
        $user->contacts = $request->telephone;
        $user->businessregno = $request->regno;
        $user->businessname = $request->bname;
        $user->businesscontact = $request->btel;
        $user->country = $request->input_30;
        $user->businesstype = $request->input_33;
        $user->businessline = $request->input_34;
        $user->employeesize = $request->input_35;
        $user->physicaladdress = $request->address;
        $user->postaladdress = $request->paddress;
        $user->district = $request->district;
        $user->tax_id_number = $request->tax_id_number;

        $user->save();
        if($user != null){
            MailController::sendsignupEmail($user->name, $user->email, $user->verification_code);

            return redirect()->back()->with(session()->flash('alert-success', 'Your Account has been created successfully.
             Please go to your email and verify your account. '));
        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Ooops!!! Something Went Wrong Your Account cannot be verified'));
    }

    public function payment(){
        return view('payment');
    }
    
    public function dashboard(Request $request)
    {
        try{
        
      if(Auth::check()){

        $products = DB::table('products')->get();
        if(!isset($products) && $products == null){
            return Redirect::to('addfresh-products');
        }
        else{
        return view('dashboard', ['products' => $products]);
        }
      }
  }
      catch (ModelNotFoundException $ex) { // User not found
            abort(422, 'Invalid Request ');
    } catch (Exception $ex) { // Anything that went wrong
    abort(500, 'Could not Find Page');
}
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

	
	public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    public function verifyUser(){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = Companies::where(['verification_code' => $verification_code])->first();
        if($user !=null){
            $user -> is_verified = 1;
            $user->save();
            return Redirect::to("payment")->with(session()->flash('alert-success', 'Your Account is verified Please Make Payments for Membership'));
        }
        return redirect()->route('payment')->with(session()->flash('alert-warning', 'Invalid verification code !'));

    }

}
