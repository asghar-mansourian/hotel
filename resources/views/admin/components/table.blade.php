<div class="table-responsive" id="tableList">
    <table class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
        <thead>
        <tr>

            @foreach($selects as $select)
                @if(is_array($select))

                    <th>
                        {{__('admin.table' . $select[1])}}
                        <div class="" style="display: none!important;">
                            <a class="sort"
                               style="@if($sortType == 'desc' && $sortField == $select[0].'_id') display:none;  @endif"
                               href="#" data-sort-field="{{$select[0].'_id'}}" data-sort-type="desc">
                                <i class="fa fa-arrow-down" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                            <a class="sort "
                               style="@if($sortType  == 'asc' && $sortField == $select[1].'_id') display:none;  @endif"
                               href="#" data-sort-field="{{$select[0].'_id'}}" data-sort-type="asc">
                                <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                        </div>

                    </th>
                @else

                    <th>
                        {{__('admin.table' . $select)}}
                        <div class="" style="display: none!important;">

                            <a class="sort" style="@if($sortType == 'desc' && $sortField == $select) display:none;  @endif"
                               href="#" data-sort-field="{{$select}}" data-sort-type="desc">
                                <i class="fa fa-arrow-down" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                            <a class="sort" style="@if($sortType  == 'asc' && $sortField == $select) display:none;  @endif"
                               href="#" data-sort-field="{{$select}}" data-sort-type="asc">
                                <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                        </div>
                    </th>
                @endif
            @endforeach
            <th style="text-align: center">{{__('admin.tableaction')}}</th>

        </tr>
        </thead>
        <tbody class="mytbody">

        @foreach($records as $record)
            <tr>
                @foreach($selects as $select)

                    @if($select == "status")
                        <td>
                            @if($record->status)
                                <div class="">  {{__('admin.tableactive')}}</div>
                            @else
                                <div class="">{{__('admin.tabledeactive')}}</div>
                            @endif
                        </td>
                    @else
                        @if(is_array($select))
                            @php


                                $count = count($select);
                                if ($count == 2){
                                    $v = $record->{$select[0]}->{$select[1]};
                                }
                                else{
                                     $v = $record->{$select[0]}->{$select[1]}->{$select[2]};
                                }



                            @endphp
                            <td>{{$v}}</td>

                        @else
                            <td>{{$record->$select}}</td>
                        @endif

                    @endif
                @endforeach
                <td class="text-nowrap text-center">

                    @foreach($options as $option)
                        @if($option == 'show')
                            <a href="{{url('admin/' . $url . '/show/' . $record->id)}}" data-userid="{{$record->id}}"
                               title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                            </a>
                            {{--                            if route needs redirect to single page--}}
                            @isset($key)
                                @if ($key == 'singlePage')
                                    <a href="{{route('blog.shows', $record->slug)}}" data-userid="{{$record->id}}"
                                       title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                        <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                                    </a>
                                @else
                                    <a href="{{url('admin/' . $url . '/show/' . $record->id)}}"
                                       data-userid="{{$record->id}}"
                                       title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                        <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                                    </a>
                                @endif
                            @endif
                        @endif
                        @if($option == 'edit')
                            <a href="{{url('admin/' . $url . '/edit/' . $record->id)}}"
                               data-toggle="tooltip"
                               title="Edit" class="m-l-10 btn btn-success btn-sm">
                                <i class="fe fe-edit mr-2"></i>{{__('admin.tableedit')}}
                            </a>
                        @endif
                        @if($option == 'delete')
                            <a href="{{url('admin/' . $url . '/delete/' . $record->id)}}" class="btn btn-sm btn-danger delete" data-toggle="tooltip"
                               title data-placement="top" data-value="{{$record->id}}" data-original-title="Delete">
                                <i class="fe fe-trash mr-2"></i>{{__('admin.tabledelete')}}
                            </a>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <style>
        nav {
            text-align: center;
        }
    </style>

    {{$paginate}}
</div>
