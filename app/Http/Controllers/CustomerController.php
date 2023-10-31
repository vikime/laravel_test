<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request){
        Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        return back()->with('success','Customer added successfully');
    }
}
