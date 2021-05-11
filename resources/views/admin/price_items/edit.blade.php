@extends('admin.layout.layout')

@section('title')
    Dashboard | Add Region
@endsection

@section('styleCustom')
    {{--    <link rel="stylesheet" href="{{url('admin/fa/plugins/dropify/dist/css/dropify.min.css')}}">--}}
    <style>
        .has-danger {
            border: 1px solid #d9534f !important;
        }
    </style>
@endsection

@section('main')
    <form class="form" method="post" id="mainForm" action="{{url('admin/price-items/update/' . $price_item->id)}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 form-label my-auto">
                                has weight
                            </label>
                            <div class="col-md-9">
                                <input class="form-control " style="    width: 21px;" name="has_weight" type="checkbox" @if($price_item->has_weight) checked @endif id="has_weight">
                            </div>
                        </div>
                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.country')}}
                            @endslot
                            @slot('name')
                                country_id
                            @endslot
                            @slot('items')
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" @if($price_item->countries_id == $country->id) selected @endif>{{$country->name}}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                From
                            @endslot
                            @slot('name')
                                from
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter From...
                            @endslot
                            @slot('value')
                                {{$price_item->from}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                To
                            @endslot
                            @slot('name')
                                to
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter To...
                            @endslot
                            @slot('value')
                                {{$price_item->to}}
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Price
                            @endslot
                            @slot('name')
                                price
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Price...
                            @endslot
                            @slot('value')
                                {{$price_item->price}}
                            @endslot
                        @endcomponent


                    @endslot


                    @slot('header')
                        <h2 class="card-title">Main Information</h2>
                    @endslot
                @endcomponent

            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')


                    @slot('header')
                        <h2 class="card-title">Save Information</h2>
                    @endslot
                    @slot('items')
                        @component('admin.components.form.submit')
                            @slot('class')
                                btn-block btn-info
                            @endslot
                            @slot('title')
                                Save
                            @endslot
                        @endcomponent

                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')
    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/price-items
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>Edit Price Item</li>
        @endslot
    @endcomponent
@endsection
