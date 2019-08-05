<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    public function index(){
      
      //$customers = ['Khang Mai', 'Ivan Castro', 'Q Do', 'Anakin Skywalker', 'Superman'];

      $customers = Customer::all();

      //$activeCustomers = Customer::active()->get();
      //$inactiveCustomers = Customer::inactive()->get();
      

    //dd($activeCustomers);
    //dd($inactiveCustomers);

      /* return view('internals.customers', [
        'activeCustomers' => $activeCustomers,
        'inactiveCustomers' => $inactiveCustomers,
      ]); */

      return view('customers.index', compact('customers'));

    }

    public function create(){
      $companies = Company::all();
      $customer = new Customer();
      return view('customers.create', compact('companies', 'customer'));

    }

    public function store(Request $request){
      //dd($request);

      $validateInput = $request->validate([
        'name'=> ['required','min:3', 'string'],
        'email'=>['unique:customers', 'email', 'required'],
        'active' => ['required'],
        'company_id' => ['required'],
      ]);

      //dd($validateInput);

      Customer::create($validateInput);

/*       $newCustomer = new Customer();
      $newCustomer->name=$request->name;
      $newCustomer->email = $request->email;
      $newCustomer->active = $request->active;
      $newCustomer->save(); */

      //return redirect('/customers');
      return redirect('/customers');

    }

    public function show(Customer $customer){

      //NOTE on ROUTE MODEL BIDING: $customer_id should match with the with the name in route. EX: Route::get('/customers/{customer_id}', 'CustomersController@show');
      // using the $customer_id to access the properies in blade file

      //dd($customer_id);
      //$customer = Customer::where('id', $customer_id)->firstorfail();
      //dd($customer);

      return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer){
      $companies = Company::all();
      return view('customers.edit', compact('customer','companies'));
    }

    public function update(Request $request, Customer $customer){
      $validateInput = $request->validate([
        'name' => ['required', 'min:3', 'string'],
        'email' => [ 'email', 'required'],
        'active' => ['required'],
        'company_id' => ['required'],
      ]);

      $customer->update($validateInput);

      return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer){
      $customer->delete();
      return redirect('/customers');

    }

}