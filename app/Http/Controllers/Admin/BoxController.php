<?php

namespace App\Http\Controllers\Admin;

use App\Box;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\ImageController;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Order;
use App\OrderBarcode;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    use ValidatorRequest;

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
            }
        }

        if ($type == Box::STATUS_BOX_CAME_TO_DOMESTIC) {
            foreach ($box->boxItems as $boxItem) {
                $boxItem->orderable()->update([
                    'status' => Order::STATUS_CUSTOMS_INSPECTION
                ]);
            }
        }

        if ($type == Box::STATUS_IN_WAREHOUSE) {
            foreach ($box->boxItems as $boxItem) {
                $boxItem->orderable()->update([
                    'status' => Order::STATUS_IN_WAREHOUSE
                ]);
            }
        }


        session()->flash('message', __('custom.box.message.update'));
        session()->flash('success', 1);
        return redirect()->back();

    }

    public function store(Request $request)
    {
        $box_id = $request->get('box_id') ?? 0;

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

        $box = !$box_id ? Box::create() : Box::find($box_id);


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
        $customer = Box::findorfail($id);
        return view('admin.boxes.edit', compact('customer'));
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
}
