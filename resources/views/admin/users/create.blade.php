@extends('admin.layout.layout')

@section('title')
    داشبورد | اضافه کردن کاربر
@endsection

@section('styleCustom')
    <link rel="stylesheet" href="{{url('admin/fa/plugins/dropify/dist/css/dropify.min.css')}}">
    <style>
        .has-danger {
            border: 1px solid #d9534f !important;
        }
    </style>
@endsection

@section('main')
    <form class="form" method="post" id="mainForm" action="{{url('admin/users/store')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                نام
                            @endslot
                            @slot('name')
                                name
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                لطفا نام را وارد کنید
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                نام خانوادگی
                            @endslot
                            @slot('name')
                                family
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                لطفا نام خانوادگی را وارد کنید
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                ایمیل
                            @endslot
                            @slot('name')
                                email
                            @endslot
                            @slot('type')
                                email
                            @endslot
                            @slot('placeholder')
                                لطفا ایمیل را وارد کنید
                            @endslot
                        @endcomponent
                    @endslot
                    @slot('header')
                        مشخصات اصلی
                    @endslot
                @endcomponent
                @component('admin.components.panel')
                    @slot('header')
                        کلمه عبور
                    @endslot
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                کلمه عبور
                            @endslot
                            @slot('name')
                                password
                            @endslot
                            @slot('type')
                                password
                            @endslot
                            @slot('placeholder')
                                لطفا کلمه عبور را وارد کنید
                            @endslot

                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                تکرار کلمه عبور
                            @endslot
                            @slot('name')
                                password_confirmation
                            @endslot
                            @slot('type')
                                password
                            @endslot
                            @slot('placeholder')
                                لطفا تکرار کلمه عبور را وارد کنید
                            @endslot

                        @endcomponent
                    @endslot
                @endcomponent
            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')
                    @slot('class')
                        block2
                    @endslot

                    @slot('header')
                        ثبت اطلاعات
                    @endslot
                    @slot('items')
                        @component('admin.components.form.submit')
                            @slot('class')
                                btn-block btn-success
                            @endslot
                            @slot('title')
                                ذخیره
                            @endslot
                        @endcomponent

                    @endslot
                @endcomponent
                @component('admin.components.panel')
                    @slot('header')
                        تصویر پروفایل
                    @endslot
                    @slot('items')
                        @component('admin.components.form.picture')
                        @endcomponent
                    @endslot
                @endcomponent
                @component('admin.components.panel')
                    @slot('header')
                        وضعیت
                    @endslot
                    @slot('items')
                        @component('admin.components.form.option')
                            @slot('name')
                                status
                            @endslot
                            @slot('items')
                                <option value="" selected>انتخاب کنید...</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            @endslot
                        @endcomponent
                    @endslot
                @endcomponent
            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')
    @component('admin.components.form.blockUi')
    @endcomponent
    @component('admin.components.form.pictureScript')
    @endcomponent
    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/users/index
        @endslot
    @endcomponent

@endsection



@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            اضافه کردن کاربر
        @endslot
        @slot('items')
            <li><a href="{{url('/admin/home')}}">داشبورد</a></li>
            <li><a href={{url('/admin/users/index')}}>مدیریت کاربران</a></li>
            <li class="active"><a href="">اضافه کردن کاربر</a></li>
        @endslot
    @endcomponent
@endsection

