@extends('layout.layout')
@section('title')
    Kargo | Contact Us
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="black pt-5">{{__('website.contact')}}<span class="yellow ml-3">Kargo</span></div>
                        <div class="italic">{{__('website.subtitle2')}}<br/>{{__('website.subtitle1')}}</div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="img_slider_con">
                            <img src="{{url('front/image/contact_mes.svg')}}" class="img_slider_faq">
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="contac_bacg">
                                    <div class="contact_map">
                                        <div style="width: 100%">
                                            <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                            <a href="https://www.maps.ie/route-planner.htm"></a></div>
                                    </div>
                                    <div class="contact_about">
                                        {{__('website.aboutdesc1')}} <br/>
                                        {{__('website.aboutdesc2')}}
                                        <div class="contact_bold">Kargoaz@gmail.com</div>
                                        <div class="contact_bold">781-349-6679</div>
                                    </div>
                                    <div class="sosyal_list">
                                        <ul class="p-0">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="contact_name">
                                    <div class="contac_title">{{__('website.contactus')}}</div>
                                    <div class="col-12" style="padding: 1px 16px;">
                                        @include('layout.error')
                                    </div>
                                    <form action="{{url('/contact-us')}}" method="post">
                                        @csrf
                                        <div class="contact_input mb-4 mt-4"><input type="text" name="name" placeholder="{{__('website.contact_name')}}" required></div>
                                        <div class="contact_input mb-4 mt-4"><input type="text" name="email" placeholder="{{__('website.contact_email')}}" required></div>
                                        <div class="contact_texta mb-4 mt-4"><textarea placeholder="{{__('website.contact_message')}}" name="message" required></textarea></div>
                                        <div class="contact_send mb-4 mt-4">
                                            <button type="submit">{{__('website.send')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
