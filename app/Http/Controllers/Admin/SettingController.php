<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    use ValidatorRequest;

    public function index()
    {

        Artisan::call("config:clear");
        Artisan::call("view:clear");
        Artisan::call("route:clear");
        Artisan::call("cache:clear");
        $settings = Setting::query()
            ->select(Setting::selectField)
            ->orderBy(Setting::sortField, Setting::sortType)
            ->paginate(Setting::paginateNumber);
        return View::make('admin.settings.index', compact('settings'), with([
            'sortField' => Setting::sortField,
            'sortType' => Setting::sortType
        ]));

    }

    public function load()
    {
        $settings = Setting::query()
            ->select(Setting::selectField)
            ->orderBy(Setting::sortArrowFieldChecked, Setting::sortArrowTypeChecked)
            ->paginate(Setting::paginateNumber);

        return View::make('admin.settings.load', compact('settings'), with([
            'sortField' => Setting::sortField,
            'sortType' => Setting::sortType
        ]));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $settings = Setting::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(Setting::selectField)
            ->paginate(Setting::paginateNumber);

        $countsetting = Setting::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.settings.table', compact('settings'), with([
            'sortField' => Setting::sortField,
            'sortType' => Setting::sortType,
            'countsetting' => $countsetting,
        ]));
    }

    public function show($id)
    {
        $Setting = Setting::query()
            ->with('user')
            ->where('id', $id)
            ->first();

        return view('admin.settings.show', compact('Setting'));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Setting::sortType;
        if ($sort_field == null)
            $sort_field = Setting::sortField;

        $setting = Setting::query()
            ->select(Setting::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Setting::paginateNumber);

        return View::make('admin.settings.table', compact('setting'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }


    public function edit($id)
    {

        $setting = Setting::query()
            ->where('id', $id)
            ->first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
//        $CountryValidate = new CountryRequest();
//        $validate = $this->validateRules($CountryValidate->rules(), $request);
//        if ($validate != null)
//            return $this->validateRules($CountryValidate->rules(), $request);
        $type = Setting::query()->where('id', $id)->first();

        if (Str::of($type->key)->substr(0, 3) == "ENV") {
            $config = Str::of($type->key)->substr(4);
            Config::set(strval($config), $request->input('value'));

            Artisan::call("config:clear");
            Artisan::call("view:clear");
            Artisan::call("route:clear");
            Artisan::call("cache:clear");
        }
        Setting::query()->where('id', $id)->update([
            'value' => $request->input('value'),
        ]);

        session()->flash('message', __('custom.Setting.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

}
