@extends('layout.layout')

@section('content')
    <div class="col-md-12 text-center">
        <div class="black pt-5"><span class="yellow mr-3">Kargo</span>Card</div>
        {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
    </div>
    <div class="container">

        <form action="{{ url('https://pay-dev.pulpal.az/payment') }}" method="get">
            @csrf
            <div class="row left-side">
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label for="" style="width: 450px!important;text-align: left">Balance:</label>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="externalId" value="{{$payment->refid}}">
                        <input type="hidden" name="merchantId" value="358">
                        <input type="hidden" name="name_en" value="test">
                        <input type="hidden" name="description_en" value="test">
                        <input disabled type="text" name="price"
                               class=" w-100 courier_input"
                               value="{{$payment->price}}" style="width: 450px!important;">


                    </div>

                </div>


                <div class="col-md-12 button-part mt-5">
                    <div class="text-center">
                        <button type="submit" class="btn-effect">Accept!</button>
                    </div>
                </div>

            </div>
        </form>

    </div>
@endsection
