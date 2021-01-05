<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\lib\Barcode;
use App\lib\Helpers;
use App\Order;
use App\OrderBarcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Storage;

class InvoiceController extends Controller
{


    public function index()
    {
        $invoices = Invoice::query()
            ->with('country', 'user')
            ->select(Invoice::selectField)
            ->orderBy(Invoice::sortField, Invoice::sortType)
            ->paginate(Invoice::paginateNumber);

        return View::make('admin.invoices.index', compact('invoices'), with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType
        ]));

    }

    public function load()
    {
        $orders = Invoice::query()
            ->select(Invoice::sortField)
            ->orderBy(Invoice::sortArrowFieldChecked, Invoice::sortArrowTypeChecked)
            ->paginate(Invoice::paginateNumber);

        return View::make('admin.invoices.load', compact('orders'), with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType
        ]));

    }

    public function showFile(Invoice $invoice)
    {
        return Response::make(Storage::get("invoice-files/" . $invoice->order_file), 200);
    }

    public function show($id)
    {
        $invoice = Invoice::query()
            ->with('country', 'user')
            ->where('id', $id)
            ->first();
        return view('admin.invoices.show', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $priceItem = new \App\Http\Controllers\Web\PriceItemController();

        $weight_price = $priceItem($request->weight)
            ->getData()
            ->price;

        // Save Data
        $invoice = Invoice::find($id);

        $invoice->update([
            'weight_price' => $weight_price,
            'weight' => $request->weight,
            'overseas_warehouse_number' => $request->overseas_warehouse_number,
            'domestic_warehouse_number' => $request->domestic_warehouse_number,
        ]);

        // Decrease of balance user;
        $invoice
            ->user
            ->decrement('usd_balance', $weight_price);

        return response()->json(200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $invoices = Invoice::query()
            ->orWhere('shop', 'like', '%' . $search . '%')
            ->select(Invoice::selectField)
            ->paginate(Invoice::paginateNumber);

        $countinvocies = Invoice::query()
            ->orWhere('shop', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.invoices.index', compact('invoices'), with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType,
            'countorders' => $countinvocies,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Invoice::sortType;
        if ($sort_field == null)
            $sort_field = Invoice::sortField;

        $orders = Invoice::query()
            ->select(Invoice::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Invoicea::paginateNumber);

        return View::make('admin.invoices.table', compact('orders'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function destroy($id)
    {
        Invoice::query()->find($id)->delete();

        session()->flash('message', __('custom.order.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

    public function status($id, $type)
    {
        $invoice = Invoice::query()->find($id);

        if ($type == Order::STATUS_WAREHOUSE_ABROAD) {
            // assign barcode to order.
            if (!$invoice->orderBarcode()->exists()) {
                $nextId = DB::table('INFORMATION_SCHEMA.TABLES')
                    ->where('table_name', 'order_barcodes')
                    ->where('TABLE_SCHEMA', env('DB_DATABASE'))
                    ->value('AUTO_INCREMENT');

                if ($nextId) {
                    $orderBarcode = $invoice->orderBarcode()->create([
                        'barcode' => Barcode::generateEAN13($nextId)
                    ]);

                    // set code to order barcodes table.
                    $code = 1000001;
                    $orderBarcodeLastCode = OrderBarcode::max('code');
                    if ($orderBarcodeLastCode) {
                        $code += 1;
                    }

                    $orderBarcode->update([
                        'code' => $code
                    ]);
                }

            }
        }

        $invoice->update([
            'status' => $type
        ]);


        $user = $invoice->user;

        if ($user) {
            // send notification
            switch ($type) {
                case Invoice::STATUS_PURCHASED:
                    Helpers::sendMessageWithId($user->id, 'Type_One');
                    break;
                case Invoice::STATUS_WAREHOUSE_ABROAD:
                    Helpers::sendMessageWithId($user->id, 'Type_Two');
                    break;
                case Invoice::STATUS_ON_WAY:
                    Helpers::sendMessageWithId($user->id, 'Type_Four');
                    break;
                case Invoice::STATUS_IN_WAREHOUSE:
                    Helpers::sendMessageWithId($user->id, 'Type_Five');
                    break;
                case Invoice::STATUS_COURIER_DELIVERY:
                    Helpers::sendMessageWithId($user->id, 'Type_Six');
                    break;
            }
        }


        session()->flash('message', __('custom.invoice.message.update'));
        session()->flash('success', 1);
        return redirect()->back();

    }
}
