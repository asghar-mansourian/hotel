<link rel="stylesheet" href="{{url('admin/fa/plugins/dropify/dist/css/dropify.min.css')}}">

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
                        {{$user->name}}
                    @endslot
                        @slot('disabled')
                            disabled
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
                    @slot('value')
                        {{$user->family}}
                    @endslot
                        @slot('disabled')
                            disabled
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
                    @slot('value')
                        {{$user->email}}
                    @endslot
                        @slot('disabled')
                            disabled
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
                    @slot('value')
                        {{$user->password}}
                    @endslot
                    @slot('disabled')
                        disabled
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
                    @slot('value')
                        {{$user->password}}
                    @endslot
                    @slot('disabled')
                        disabled
                    @endslot
                @endcomponent
            @endslot
        @endcomponent
    </div>
    <div class="col-12 col-lg-4">
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
                        <option value="1" @if($user->status == '1') selected @endif>فعال</option>
                        <option value="0" @if($user->status == '0') selected @endif>غیرفعال</option>
                    @endslot
                        @slot('disabled')
                            disabled
                        @endslot
                @endcomponent
            @endslot
        @endcomponent
    </div>

</div>

@component('admin.components.form.pictureScript')
@endcomponent

@component('admin.components.script.mainFormScript')
    @slot('mainFormUrlValue')
        ../../../admin/users/index
    @endslot
@endcomponent
