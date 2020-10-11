@php
    $action = Route::currentRouteAction();
    $action = str_replace('@index','',$action);
    $controllerClass = $action;
    $actionClass = str_replace(app()->getNamespace().'Http\Controllers\\','',$action);
    $action = explode('\\',$action);
    $sectionName = $action[3];
    $controllerName = $action[6];

@endphp
@php
    use Illuminate\Support\Facades\View;View::make()
@endphp
@includeFirst(["Role.views.admin.role.index"])
{{--@includeFirst(["$sectionName.views.admin.".$sectionName.".index"])--}}
{{--    <div class="col-12 grid-margin stretch-card">--}}
{{--        <div class="card">--}}
{{--            @yield('table_header',View::make('vendor.section.index-table-header',compact([--}}
{{--                'items',--}}
{{--                'sectionName',--}}
{{--                'actionClass',--}}
{{--                'controllerName'--}}
{{--            ])))--}}

{{--            <div class="card-body">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-hover">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            @yield('table_head',View::make('vendor.section.index-table-head'))--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @yield('table_body',View::make('vendor.section.index-table-body',compact([--}}
{{--                            'items',--}}
{{--                            'sectionName',--}}
{{--                            'actionClass',--}}
{{--                            'controllerName'--}}
{{--                        ])))--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card-footer">--}}
{{--                {!! $items->appends(Request::except('page'))->render() !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <form method="POST" action="{{action($actionClass.'@destroy',1)}}" id="delete-form">--}}
{{--        @csrf--}}
{{--        @method('delete')--}}
{{--    </form>--}}
{{--@endsection--}}

{{--@push('js')--}}
{{--    <script>--}}
{{--        $(document).on('click', '.delete-btn', function () {--}}
{{--            if (confirm("@lang('admin.delete_confirmation')")) {--}}
{{--                var btn = $(this);--}}
{{--                var deleteForm = $("#delete-form");--}}
{{--                var checkedItems = $('.delete-item:checked');--}}
{{--                if (checkedItems.length) {--}}
{{--                    checkedItems.each(function () {--}}
{{--                        deleteForm.append('<input type="hidden" name="deleteId[]" value="' + $(this).val() + '">');--}}
{{--                    });--}}
{{--                    deleteForm.submit();--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
