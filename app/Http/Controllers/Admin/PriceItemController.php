<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\PriceItemRequest;
use App\Http\Requests\Admin\UpdatePriceItemRequest;
use App\PriceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PriceItemController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read PriceItem|edit PriceItem|create PriceItem|delete PriceItem']);
    }

    public function index()
    {
        $priceItems = PriceItem::paginate(PriceItem::paginateNumber);
        return View::make('admin.price_items.index', compact('priceItems'), with([
            'sortField' => PriceItem::sortField,
            'sortType' => PriceItem::sortType
        ]));
    }

    public function create()
    {
        return view('admin.price_items.create');
    }

    public function store(Request $request)
    {
        $priceItemRequest = new PriceItemRequest();
        $validate = $this->validateRules($priceItemRequest->rules(), $request);


        if ($validate != null)
            return $this->validateRules($priceItemRequest->rules(), $request);


        for ($i = 0; $i < count($request->froms); $i++) {
            $details[] = [
                'from' => $request->froms[$i],
                'to' => $request->tos[$i],
                'price' => $request->prices[$i],
                'has_weight' => isset($request->weight[$i]) ? true : false,
            ];
        }


        PriceItem::query()->insert($details);

        session()->flash('message', 'price items successfully created');
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function load()
    {
        $countries = PriceItem::query()
            ->select(PriceItem::sortField)
            ->orderBy(PriceItem::sortArrowFieldChecked, PriceItem::sortArrowTypeChecked)
            ->paginate(PriceItem::paginateNumber);

        return View::make('admin.price_items.load', compact('countries'), with([
            'sortField' => PriceItem::sortField,
            'sortType' => PriceItem::sortType
        ]));

    }

    public function edit($id)
    {

        $price_item = PriceItem::find($id);

        return view('admin.price_items.edit', compact('price_item', 'id'));
    }

    public function update(Request $request, $id)
    {
        $priceItemRequest = new UpdatePriceItemRequest();
        $validate = $this->validateRules($priceItemRequest->rules(), $request);


        if ($validate != null)
            return $this->validateRules($priceItemRequest->rules(), $request);

        PriceItem::query()->where('id', $id)->update([
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'price' => $request->input('price'),
            'has_weight' => isset($request->has_weight) ? true : false,
        ]);

        session()->flash('message', __('custom.price_items.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        PriceItem::query()->find($id)->delete();

        session()->flash('message', __('custom.price_items.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
