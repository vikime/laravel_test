<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddresses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class CustomerController extends Controller
{


    public function showForm()
    {
        return view('welcome');
    }
    
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|numeric|unique:customers',
            'addresses' => 'numeric',
            'pincode' => 'numeric',
        ]);
        
       $customer = Customer::create($validatedData);

        return back()->with('success','Customer added successfully');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users|max:255',
        ]);

        return response()->json(['message' => 'Email is available']);
    }

    public function checkPhone(Request $request)
    {
        $request->validate([
            'phone' => [
                'required',
                'numeric',
                'digits:10'
            ],
        ]);

        return response()->json(['message' => 'Phone is available']);
    }
}