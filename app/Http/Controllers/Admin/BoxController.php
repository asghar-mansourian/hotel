<?php

namespace App\Http\Controllers\Admin;

use App\Box;
use App\Currency;
use App\Exports\BoxesExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\ImageController;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\lib\Barcode;
use App\lib\Helpers;
use App\Order;
use App\OrderBarcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BoxController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Box|edit Box|create Box|delete Box']);
    }


    public function index()
    {
        $status = \request()->get('status') ?? Box::STATUS_FILL_IN_BOX;

        $boxes = Box::where('status', $status)
            ->paginate(Box::paginateNumber);

        return view('admin.boxes.index', compact('boxes'), with([
            'sortField' => Box::sortField,
            'sortType' => Box::sortType
        ]));
    }

    public function create()
    {
        return view('admin.boxes.create');
    }

    public function show($id)
    {
        $box = Box::find($id);

        return view('admin.boxes.show', compact('box'));
    }

    public function status($id, $type)
    {
        $box = Box::query()->find($id);

        $box->update([
            'status' => $type,
        ]);

        if ($type == Box::STATUS_BOX_AIR_SEND) {
            foreach ($box->boxItems as $boxItem) {
                $boxItem->orderable()->update([
                    'status' => Order::STATUS_ON_WAY
                ]);

                $boxItem->orderable->statusLogs()->create([
                    'admin_id' => auth()->user()->id,
                    'status' => Order::STATUS_ON_WAY
                ]);

                $getTable = $boxItem->orderable()->getModel()->getTable();
                $user = null;

                if ($getTable == 'invoices') {
                    $user = $boxItem->orderable->user;
                } elseif ($getTable == 'order_items') {
                    $user = $boxItem->orderable->order->user;
                }

                if ($user) {
                    if (!$box->boxItems()->where('has_send_sms', $user->id)->where('status', Box::STATUS_BOX_AIR_SEND)->exists()) {
                        Helpers::sendMessageWithId($user->id, 'Notification_Pattern_Status_On_Way');

                        $boxItem->update([
                            'has_send_sms' => $user->id,
                            'status' => Box::STATUS_BOX_AIR_SEND,
                        ]);
                    }
                }

            }
        }

        if ($type == Box::STATUS_BOX_CAME_TO_DOMESTIC) {
            foreach ($box->boxItems as $boxItem) {
                $boxItem->orderable()->update([
                    'status' => Order::STATUS_CUSTOMS_INSPECTION
                ]);

                $boxItem->orderable->statusLogs()->create([
                    'admin_id' => auth()->user()->id,
                    'status' => Order::STATUS_CUSTOMS_INSPECTION
                ]);
            }
        }

        if ($type == Box::STATUS_IN_WAREHOUSE) {
            foreach ($box->boxItems as $boxItem) {
                $boxItem->orderable()->update([
                    'status' => Order::STATUS_IN_WAREHOUSE
                ]);

                $boxItem->orderable->statusLogs()->create([
                    'admin_id' => auth()->user()->id,
                    'status' => Order::STATUS_IN_WAREHOUSE
                ]);


                $getTable = $boxItem->orderable()->getModel()->getTable();
                $user = null;

                if ($getTable == 'invoices') {
                    $user = $boxItem->orderable->user;
                } elseif ($getTable == 'order_items') {
                    $user = $boxItem->orderable->order->user;
                }

                if ($user) {
                    if (!$box->boxItems()->where('has_send_sms', $user->id)->where('status', Box::STATUS_IN_WAREHOUSE)->exists()) {
                        Helpers::sendMessageWithId($user->id, 'Notification_Pattern_Status_in_Warehouse');

                        $boxItem->update([
                            'has_send_sms' => $user->id,
                            'status' => Box::STATUS_IN_WAREHOUSE
                        ]);
                    }
                }

            }
        }


        session()->flash('message', __('custom.box.message.update'));
        session()->flash('success', 1);
        return redirect()->back();

    }

    public function store(Request $request)
    {
        $box_id = $request->get('box_id') ?? 0;

        if ($box_id && $request->get('barcode') === 'load-boxes') {
            $boxes = Box::find($box_id)->boxItems()->with('orderable.orderBarcode')->get();

            return response()->json(['items' => $boxes], 200);
        }

        $barcode = OrderBarcode::where('barcode', $request->get('barcode'))->first();


        if (!$barcode) {
            return response()->json(['message' => 'Barcode Not Found!'], 404);
        }

        if (!$barcode) {
            return response()->json(['message' => 'Barcode Not Found!'], 404);
        }

        if ($barcode->orderable->status != Order::STATUS_WAREHOUSE_ABROAD) {
            return response()->json(['message' => 'Already This Order Saved Another Box!!!'], 404);
        }

        $nextId = DB::table('INFORMATION_SCHEMA.TABLES')
            ->where('table_name', 'boxes')
            ->where('TABLE_SCHEMA', env('DB_DATABASE'))
            ->value('AUTO_INCREMENT');

        $box = !$box_id ?
            Box::create([
                'barcode' => Barcode::generateEAN13($nextId)
            ]) :
            Box::find($box_id);

        $order = $barcode->orderable;

        if ($order->boxItems()->where('box_id', $box->id)->exists()) {
            return response()->json(['message' => 'Already This Order Saved In Box!'], 404);
        }

        $order->boxItems()->create([
            'box_id' => $box->id
        ]);

        // update status;
        $barcode->orderable()->update([
            'status' => Order::STATUS_FILL_IN_BOX
        ]);

        $boxes = $box->boxItems()->with('orderable.orderBarcode')->get();

        return response()->json(['items' => $boxes, 'box_id' => $box->id], 200);
    }

    public function edit($id)
    {
        $box = Box::findorfail($id);
        return view('admin.boxes.edit', compact('box'));
    }

    public function update(Request $request, $id)
    {
        $BoxValidate = new UpdateBoxRequest();
        $validate = $this->validateRules($BoxValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($BoxValidate->rules(), $request);
        $customer = Box::findorfail($id);
        if ($request->hasFile('picture')) {
            BoxHelper::deleteImage($customer);
            $file_name = BoxHelper::uploadImage($request->file('picture'));
            $image = new ImageController();
            $image->store($file_name, $customer);
            $customer->update([
                'name' => $request->name,
                'link' => $request->link
            ]);
            session()->flash('message', __('admin.general.message.customer_update_successful'));
            session()->flash('success', 1);
            return response()->json([], 200);
        }
        $customer->update([
            'name' => $request->name,
            'link' => $request->link
        ]);
        session()->flash('message', __('admin.general.message.customer_update_successful'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function delete($id)
    {
        $customer = Box::findorfail($id);
        $customer->delete();
        session()->flash('message', __('admin.general.message.customer_delete_successful'));
        session()->flash('success', 1);
        return redirect('admin/boxes/');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $boxes = Box::where('name', 'like', '%' . $search . '%')->orWhere('link', 'like', '%' . $search . '%')->paginate(Box::paginateNumber);
        return view('admin.boxes.index', compact('boxes'), with([
            'sortField' => Box::sortField,
            'sortType' => Box::sortType
        ]));
    }

    public function createXml(Request $request)
    {
       $boxs_id=$request->get('box');

       $boxs = Box::whereIn('id',$boxs_id )->get();
        $toValue = Currency::query()
            ->where('from', 'TRY')
            ->where('to', 'USD')
            ->first()->to_value;
       foreach ($boxs as $box)
       {
           $boxItems=$box->boxItems()->get();
           foreach ($boxItems as $boxItem)
           {
               $url_info = parse_url( $boxItem->orderable->link);
               $url_info = $url_info['host'];
               if (!$user) {
                   $getTable = $boxItem->orderable()->getModel()->getTable();

                   if ($getTable == 'invoices') {
                       $user = $boxItem->orderable->user;
                   } elseif ($getTable == 'order_items') {
                       $user = $boxItem->orderable->order->user;
                   }
               }
               $xml['TR_NUMBER']=$boxItem->orderable_id;
               $xml['DIRECTION']='1';
               $xml['QUANTITY_OF_GOODS']='1';
               $xml['WEIGHT_GOODS']=$boxItem->orderable->weight;
               $xml['INVOYS_PRICE']=Helpers::formatPrice($boxItem->orderable->price * $toValue);
               $xml['CURRENCY_TYPE']='840';
               $xml['NAME_OF_GOODS']='';
               $xml['IDXAL_NAME']=$user->name . ' ' . $user->family;
               $xml['IDXAL_ADRESS']=$user->address;
               $xml['IXRAC_NAME']=$url_info;
               $xml['IXRAC_ADRESS']=$url_info;
               $xml['GOODS_TRAFFIC_FR']='792';
               $xml['GOODS_TRAFFIC_TO']='31';
               $xml['QAIME']=$boxItem->orderable_id;
               $xml['TRACKING_NO']='0';
               $xml['FIN']=$user->fin;
               $xml['PHONE']=$user->phone;
               $xmls[]=$xml;
           }

       }
        return response()->view('xml', compact('xmls'))->header('Content-Type', 'text/xml');

    }
    public function createExport(Request $request)
    {
       $boxs_id=$request->get('box');

        return Excel::download(new BoxesExport($boxs_id), 'boxes.xlsx');


    }

}
