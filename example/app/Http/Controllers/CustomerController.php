<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){


        return view("customers.index");


    }
    public function index()
    {

        

        
      


    }
    public function register(){


        return view("customers.register");


    }

    public function loginpage(){


        return view("customers.login");



    }
    public function login(Request $request){



        $request->validate([
        'fname' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    
    $fname = $request->input('fname');
    $password = $request->input('password');
    $customer = Customer::where('fname', $fname)->first();
    if($customer && Hash::check($password,$customer->password)){


        session::put("customer",$customer);



        return redirect()->route('go')->with("login","Successfully logged in");
    }
    else{


        return redirect()->route('login')->with("loginfail","Failed to log in");



    }






        



    }


    /**
     * Show the form for creating a new resource.
     */
    public function go()

    {
        $customer = session::get('customer');

        return view("customers.dashboard",compact('customer'));


    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validateddata=$request->validate([

            "fname"=>"required|string|min:4",
            "lname"=>"required|string",
            'password' => 'required|string|confirmed|min:8',
            'gender' => 'required|string|in:male,female',
        ]);
        $existingCustomer = Customer::where('fname', $validateddata['fname'])
        ->orwhere('lname', $validateddata['lname'])
        ->first();

    if ($existingCustomer) {
        return redirect()->route('register')->with('fail','Customer with this name already exists.');
    }


        $validateddata['password']=Hash::make($validateddata['password']);

      
        

        Customer::create($validateddata);

        return redirect()->route('home')->with("success","Registration successfully");

       


        
    }

    /**
     * Display the specified resource.
     */
    public function show()



    {


        return['message'=>"hello"];




        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function handleTransaction(Request $request)
{
    $customer = Session::get('customer');

    if (!$customer) {
        return redirect()->route('login')->with('loginfail', 'Please log in first.');
    }

    // Reload latest data
    $customer = Customer::find($customer->id);

    $action = $request->input('action');

    if ($action === 'deposit') {
        $request->validate([
            'deposit' => 'required|numeric|min:1',
        ]);

        $amount = $request->input('deposit');
        $customer->balance += $amount;
        $customer->save();

        Session::put('customer', $customer);
        return redirect()->route('go')->with('success', 'Deposit successful!');

    } elseif ($action === 'withdraw') {
        // handle withdraw logic
    } elseif ($action === 'transfer') {
        // handle transfer logic
    }

    return redirect()->route('go')->with('fail', 'Invalid action.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
