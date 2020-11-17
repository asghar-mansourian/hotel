@extends('layout.layout')
@section('title')
    Kargo | {{__('website.customers')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($customers as $customer)
                <div class="col-md-2 col-sm-6 height_380 mb-5">
                    <div class="p-0">
                        <div class="blog_mage">
                            <div class="blog_img">
                                <div>
                                    <a href="{{$customer->link}}"><img src="{{asset('images/customers/'.$customer->image->file_name)}}" alt="{{$customer->name}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
