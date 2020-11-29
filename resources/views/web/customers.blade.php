@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.customers')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($customers as $customer)
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="p-0">
                        <div class="blog_mage">
                            <div class="blog_img">
                                <div>
                                    <a href="{{$customer->link}}" target="_blank">
                                        <img src="{{asset('images/customers/'.$customer->image->file_name)}}" alt="{{$customer->name}}" style="    width: 245px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
