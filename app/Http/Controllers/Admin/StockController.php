<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Stock;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\StockRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StockController extends Controller
{

    use ValidatorRequest;


    public function show($id)
    {
        //
    }

    public function index()
    {
        $stocks = Stock::query()
            ->select(Stock::selectField)
            ->orderBy(Stock::sortField, Stock::sortType)
            ->paginate(Stock::paginateNumber);
        return View::make('admin.stocks.index', compact('stocks'), with([
            'sortField' => Stock::sortField,
            'sortType' => Stock::sortType
        ]));


    }

    public function load()
    {
        $stocks = Stock::query()
            ->select(Stock::sortField)
            ->orderBy(Stock::sortArrowFieldChecked, Stock::sortArrowTypeChecked)
            ->paginate(Stock::paginateNumber);

        return View::make('admin.stocks.load', compact('stocks'), with([
            'sortField' => Stock::sortField,
            'sortType' => Stock::sortType
        ]));

    }

    public function create()
    {
        $authores = Admin::query()->get();
        return view('admin.stocks.create', compact('authores'));
    }

    public function store(Request $request)
    {
        $stockValidate = new StockRequest();
        $validate = $this->validateRules($stockValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($stockValidate->rules(), $request);


        Stock::query()->insert([
            'address' => $request->input('address'),
        ]);

        session()->flash('message', __('admin.stockmessagecreate'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $stocks = Stock::query()
            ->orWhere('address', 'like', '%' . $search . '%')
            ->select(Stock::selectField)
            ->paginate(Stock::paginateNumber);

        $countstocks = Stock::query()
            ->orWhere('address', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.stocks.index', compact('stocks'), with([
            'sortField' => Stock::sortField,
            'sortType' => Stock::sortType,
            'countstocks' => $countstocks,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Stock::sortType;
        if ($sort_field == null)
            $sort_field = Stock::sortField;

        $stocks = Stock::query()
            ->select(Stock::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Stock::paginateNumber);

        return View::make('admin.stocks.table', compact('stocks'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {
        $stock = Stock::query()
            ->where('id', $id)
            ->first();
        return view('admin.stocks.edit', compact('stock', 'id'));
    }

    public function update(Request $request, $id)
    {
        $stockValidate = new StockRequest();
        $validate = $this->validateRules($stockValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($stockValidate->rules(), $request);


        Stock::query()->where('id', $id)->update([
            'address' => $request->input('address'),
        ]);

        session()->flash('message', __('admin.stockmessageupdate'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Stock::query()->find($id)->delete();

        session()->flash('message', __('admin.stockmessagedelete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
