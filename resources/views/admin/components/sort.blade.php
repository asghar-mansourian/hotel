@component('admin.components.panel')
    @slot('items')
        <form class="form" method="post" id="sortForm" action="{{url('admin/users/sort')}}">
            @csrf


            @component('admin.components.form.optionLabel')

                @slot('name')
                    sort_field
                @endslot
                @slot('items')
                    {{$options}}
                @endslot
                @slot('label')
                    فیلد
                @endslot
            @endcomponent
            @component('admin.components.form.optionLabel')

                @slot('name')
                    sort_type
                @endslot
                @slot('items')
                    {{$options2}}
                @endslot
                @slot('label')
                    نوع
                @endslot
            @endcomponent
            {{--            <div class="form-group row">--}}
            {{--                <label for="example-text-input" class="col-4 col-sm-3 col-md-2 col-form-label">نوع</label>--}}
            {{--                <div class="col-8 col-sm-9 col-md-10">--}}

            {{--                    <select name="sort_type" id="sort_type" class="custom-select col-12">--}}
            {{--                        <option value="" selected="">انتخاب کنید ...</option>--}}
            {{--                        <option value="ASC">صعودی</option>--}}
            {{--                        <option value="DESC">نزولی</option>--}}
            {{--                    </select>--}}

            {{--                </div>--}}
            {{--            </div>--}}

        </form>

    @endslot
    @slot('header')
        مرتب سازی
    @endslot
    @slot('icon')
        fa fa-first-order mr-2
    @endslot

@endcomponent
