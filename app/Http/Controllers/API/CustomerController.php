<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Validator;
use DataTables;


class CustomerController extends Controller

{
    // all customers
    public function index()
    {
        // $customers = Customer::all()->toArray();
        // return array_reverse($customers);
        // return DataTables::collection(Customer::all())->make(true);

        $data = Customer::select('*')->orderBy('created_at', 'DESC');
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
   
                        $btn ='
                        <div class="btn-group" role="group">
                        <a class="btn btn-primary" href="/customers/edit-customer/'.$row->id.'">Edit</a>
                      
                    </div>';
  
                        return $btn;
                })
                
  
                
                ->rawColumns(['action', 'status'])
                ->make(true);


    }

    // add customer
    public function add(Request $request)
    {
        $customer = new Customer([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);
        $customer->save();
        return response()->json('The customer successfully added');
    }
    // edit customer
    public function edit($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }
    // update customer
    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return response()->json('The customer successfully updated');
    }
    // delete customer
    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json('The customer successfully deleted');
    }
}