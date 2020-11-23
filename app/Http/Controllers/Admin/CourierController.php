<?php

namespace App\Http\Controllers\Admin;

use App\CourierProductItem;
use App\Http\Controllers\Controller;
use App\Courier;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CourierController extends Controller
{


    public function index()
    {
//        $couriers = Courier::query()
//            ->with('country' , 'user')
//            ->select(Courier::selectField)
//            ->orderBy(Courier::sortField, Courier::sortType)
//            ->paginate(Courier::paginateNumber);

        $couriers = Courier::query()
            ->with('stock')
            ->latest()
            ->select(Courier::selectField)
            ->orderBy(Courier::sortField, Courier::sortType)
            ->paginate(Courier::paginateNumber);
        return View::make('admin.couriers.index', compact('couriers'), with([
            'sortField' => Courier::sortField,
            'sortType' => Courier::sortType
        ]));

    }

    public function load()
    {
        $orders = Courier::query()
            ->select(Courier::sortField)
            ->orderBy(Courier::sortArrowFieldChecked, Courier::sortArrowTypeChecked)
            ->paginate(Courier::paginateNumber);

        return View::make('admin.couriers.load', compact('orders'), with([
            'sortField' => Courier::sortField,
            'sortType' => Courier::sortType
        ]));

    }

    public function show($id)
    {
        $courierItems = CourierProductItem::query()
            ->where('courier_id', $id)
            ->get();

        $courier = Courier::query()
            ->where('id', $id)
            ->first();
        return view('admin.couriers.show' , compact('courierItems' , 'courier'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $couriers = Courier::query()
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('home', 'like', '%' . $search . '%')
            ->orWhere('street', 'like', '%' . $search . '%')
            ->orWhere('district', 'like', '%' . $search . '%')
            ->select(Courier::selectField)
            ->paginate(Courier::paginateNumber);

        $countinvocies = 1;

        return View::make('admin.couriers.index', compact('couriers'), with([
            'sortField' => Courier::sortField,
            'sortType' => Courier::sortType,
            'countorders' => $countinvocies,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Courier::sortType;
        if ($sort_field == null)
            $sort_field = Courier::sortField;

        $orders = Courier::query()
            ->select(Courier::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Couriera::paginateNumber);

        return View::make('admin.couriers.table', compact('orders'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function destroy($id)
    {
        Courier::query()->find($id)->delete();

        session()->flash('message', __('custom.order.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }
    public function status($id , $type)
    {
        Courier::query()->find($id)->update([
            'status' => $type,
        ]);
        session()->flash('message', __('custom.Courier.message.update'));
        session()->flash('success', 1);
        return redirect()->back();

    }
}
