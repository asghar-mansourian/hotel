<?php

namespace App\Http\Controllers\Admin;

use App\Box;
use App\BoxItem;
use App\Http\Controllers\Controller;
use App\Order;

class BoxItemController extends Controller
{
    public function delete($id)
    {

        $box = BoxItem::findorfail($id);

        // update status;
        $box->orderable()->update([
            'status' => Order::STATUS_WAREHOUSE_ABROAD
        ]);

        $box->delete();

        $box = Box::find(request()->get('box_id'));

        $boxes = $box->boxItems()->with('orderable.orderBarcode')->get();

        return response()->json(['items' => $boxes, 'box_id' => $box->id], 200);
    }
}
