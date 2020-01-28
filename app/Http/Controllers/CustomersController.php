<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;


class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//      $this->middleware('auth')->except('index'); Able to see Customers List but can't add, edit or
//      delete Customer

    }

    public function index(){

        $customers = Customer::all();
        /*
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();

 */
        return view('customers.index',compact('customers'));
    }

    public function create(){
        $companies = Company::all();
        $customer = new Customer;
        return view('customers.create', compact('companies','customer'));
    }

    public function store(){

        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);
        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect('customers');
    }

    public function show(Customer $customer){
        //$customer = Customer::where('id',$customer)->firstOrFail();
        //dd($customer);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer){
        $companies = Company::all();
        return view('customers.edit', compact('customer','companies'));
    }

    public function update(Customer $customer){


        $customer->update($this->validateRequest());
        $this->storeImage($customer);
        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer){


        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest(){
        return request()->validate([

            'name' => 'required|min:3',
            'email' => 'required',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',

        ]);



    }

    private function storeImage($customer)
    {
        if(request()->has('image')){
            $customer->update([
                'image' => request()->image->store('uploads', 'public')
            ]);

            $image = Image::make(public_path('storage/'.$customer->image))->fit(100,100);
            $image->save();
        };
    }

}
