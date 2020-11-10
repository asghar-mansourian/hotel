@extends('layout.layout')

@section('content')
    <div class="col-md-12 text-center">
        <div class="black pt-5"><span class="yellow mr-3">Kargo</span>{{__('member.card')}}</div>
        {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
    </div>
    <div class="container">


        <div class="row left-side">
            <div class="col-md-12 mt-2">
                <div class="text-center">
                    <label for="" style="width: 450px!important;text-align: left">{{__('member.message')}}:</label>
                </div>
                <div class="text-center">
                    <input disabled type="text" name="price"
                           class=" w-100 courier_input"
                           value="{{$message}}" style="width: 450px!important;">


                </div>

            </div>



            </div>

    </div>
@endsection
