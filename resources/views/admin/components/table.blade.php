<div class="table-responsive" id="tableList">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>

            @foreach($selects as $select)
                @if($select == 'edit' || $select == 'delete' || $select == 'show')
                    <th style="text-align: center">{{getWord($select)}}</th>
                @else
                    <th>
                        {{getWord($select)}}
                        <a class="sort" style="@if($sortType == 'desc' && $sortField == $select) display:none;  @endif" href="#" data-sort-field="{{$select}}" data-sort-type="desc">
                            <i class="fa fa-arrow-down" style="color: black;margin-right: 4px;color: #777;font-size: 12px;"></i>
                        </a>
                        <a class="sort" style="@if($sortType  == 'asc' && $sortField == $select) display:none;  @endif" href="#" data-sort-field="{{$select}}" data-sort-type="asc">
                            <i class="fa fa-arrow-up" style="color: black;margin-right: 4px;color: #777;font-size: 12px;"></i>
                        </a>

                    </th>
                @endif
            @endforeach
        </tr>
        </thead>
        <tbody class="mytbody">
        @foreach($records as $record)
            <tr>
                @foreach($selects as $select)
                    @if($select == 'status')

                        <td>
                            @if($record->status)
                                <div class="label label-table label-success">فعال</div>
                            @else
                                <div class="label label-table label-red">غیر فعال</div>
                            @endif
                        </td>

                    @elseif($select == 'edit' || $select == 'delete' || $select == 'show')
                        <td class="text-nowrap text-center">
                            @if($select == 'show')
                                <a href="#" data-userid="{{\Vinkla\Hashids\Facades\Hashids::encode($record->id)}}" data-toggle="modal"
                                   title="نمایش" class="m-l-10 show-info" data-target=".bs-example-modal-lg"> <i
                                        class="fa fa-eye text-blue text-inverse "></i> </a>
                            @endif
                            @if($select == 'edit')
                                <a href="{{url('admin/' . $url . '/edit/' . \Vinkla\Hashids\Facades\Hashids::encode($record->id))}}"
                                   data-toggle="tooltip"
                                   title="ویرایش" class="m-l-10 "> <i
                                        class="fa fa-pencil text-purple"></i> </a>
                            @endif
                            @if($select == 'delete')

                                <a href="{{url('admin/' . $url . '/destroy/' . $record->id)}}" data-toggle="tooltip"
                                   title data-placement="top" data-original-title="حذف">
                                    <i
                                        class="fa fa-close text-danger"></i> </a>
                            @endif
                        </td>
                    @else
                        <td>{{$record->$select}}</td>

                    @endif
                @endforeach
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
