<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Just testing the data
        $user = User::find(2);
        $customerFromUser = $user->customer;
        $customer = Customer::find(1);
        $userFromCustomer = $customer->user;
        return ["customer" => $customerFromUser, "user" => $userFromCustomer];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # First we create the user
        $user = new User($request->input());
        # the hash
        $user->password = Hash::make($request->input("password"));
        # save it. Once saved, we have a fresh user instance
        $user->saveOrFail();
        # So we create the customer
        $customer = new Customer($request->input());
        $customer->user_id = $user->id;
        $customer->saveOrFail();
        Auth::loginUsingId($user->id);
        return redirect()->intended("store.index");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
