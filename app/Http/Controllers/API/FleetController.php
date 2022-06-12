<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Fleet;
use App\Models\Order;
use Illuminate\Http\Request;
use Validator;
use DataTables;


class FleetController extends Controller

{
    // all fleets
    public function index($type)
    {
        // $fleets = Fleet::all()->toArray();
        // return array_reverse($fleets);
        // return DataTables::collection(Fleet::all())->make(true);

        
        if ($type == "all") {
            $data = Fleet::select('*')->orderBy('created_at', 'DESC');
        } elseif($type == "available") {
            $data = Fleet::select('*')->where('status',0 )->orderBy('created_at', 'DESC');
        }
        elseif($type == "loading") {
            $data = Fleet::select('*')->where('status', 1 )->orderBy('created_at', 'DESC');
        }
        
        elseif($type == "transit") {
            $data = Fleet::select('*')->where('status',2 )->orderBy('created_at', 'DESC');
        }
        
        

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
   
                        $btn = '<a href="/fleet/edit-fleet/'.$row->id.'" class="edit btn btn-primary btn-sm">View Fleet</a>';
  
                        return $btn;
                })
                
                ->editColumn('status', function($row){
   
                    if ($row->status== 0) {
                        $class="drop-success";
                    } elseif($row->status== 1) {
                        $class = "drop-secondary";
                    }else{
                        $class="drop-warning";
                    }
                    $s = $row->status == 0 ? 'selected' : '';
                    $ps = $row->status == 1? 'selected' : '';
                    $ns = $row->status == 2 ? 'selected' : '';
                  
                        // $btn = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
  
                        // return $btn;
                        return '<div class="action-list"><select id="status" onchange="fleetstatus(this.value)" class=" nice-select process select droplinks '.$class.'">
                        <option  value="'. route('fleet.status',['id1' => $row->id, 'id2' => 0]).'" '.$s.'>Available</option>
                        <option  value="'. route('fleet.status',['id1' => $row->id, 'id2' => 1]).'" '.$ps.'>Loading</option>
                        <option  value="'. route('fleet.status',['id1' => $row->id, 'id2' => 2]).'" '.$ns.'>On Transit</option>
                        </select></div>';
                })
                
                ->rawColumns(['action', 'status'])
                ->make(true);


    }

    public function status($id1, $id2)
    {
     
        $fleet = Fleet::find($id1);
        if ($fleet->order_id != null) {
            $fleet->status = $id2;

            $fleet->save();
    
            if ($id2 == 1) {
                $order_id = $fleet->order_id;
                $order= Order::find($order_id);
                $order->status = 1;
                $order->save();

                
            }elseif ($id2 == 2) {
                $order_id = $fleet->order_id;
                $order= Order::find($order_id);
                $order->status = 2;
                $order->save();

                $customer = $order->customer;

                $details = [
                    'title' => 'Hi,'.$customer->first_name,
                    'body' => 'Your order '.$order->order_id.' has been dipatched'
                ];
               
                \Mail::to('stacyanne01@gmail.com')->send(new \App\Mail\MyMail($details));
            }elseif ($id2 == 0) {
                $order_id = $fleet->order_id;
                $order= Order::find($order_id);
                $order->status = 3;
                $order->save();
    
    
                $fleet->order_id = null;
                $fleet->save();
      
            }
        }


    }

    // add fleet
    public function add(Request $request)
    {
        $fleet = new Fleet([
            'reg_no' => $request->input('reg_no'),
            'contact' => $request->input('contact')
        ]);
        $fleet->save();
        return response()->json('The fleet successfully added');
    }
    // edit fleet
    public function edit($id)
    {
        $data['fleet'] = Fleet::find($id);
        $data['orders'] = Order::get();

        return response()->json($data);
    }
    // update fleet
    public function update($id, Request $request)
    {
        // return response()->json($request->order_id);
        $fleet = Fleet::find($id);
        $fleet->update($request->all());

        if($request->has('order_id')){
            $fleet->status = 1;
            $fleet->save();

            $order = Order::find($request->order_id);

            $order->status = 1;
            $order->save();
        }
        return response()->json('The fleet successfully updated');
    }
    // delete fleet
    public function delete($id)
    {
        $fleet = Fleet::find($id);
        $fleet->delete();
        return response()->json('The fleet successfully deleted');
    }
}