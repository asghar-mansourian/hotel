<div class="table-responsive" id="tableList">
    <table class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
        <thead>
        <tr>

        @foreach($selects as $select)

                    <th>
                        {{$select}}
                        <a class="sort" style="@if($sortType == 'desc' && $sortField == $select) display:none;  @endif" href="#" data-sort-field="{{$select}}" data-sort-type="desc">
                            <i class="fa fa-arrow-down" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                        </a>
                        <a class="sort" style="@if($sortType  == 'asc' && $sortField == $select) display:none;  @endif" href="#" data-sort-field="{{$select}}" data-sort-type="asc">
                            <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                        </a>

                    </th>
            @endforeach
            <th style="text-align: center">Actions</th>

        </tr>
        </thead>
        <tbody class="mytbody">
        @foreach($records as $record)
            <tr>
                        <td>{{$record->id}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->email}}</td>
                        <td>
                            @if($record->status)
                                <div class="">Active</div>
                            @else
                                <div class="label label-table label-red">Deactive</div>
                            @endif
                        </td>

                        <td class="text-nowrap text-center">
                                <a href="#"  data-userid="{{$record->id}}" data-toggle="modal"
                                   title="Show" class="m-l-10 show-info btn-sm btn btn-info" data-target=".bs-example-modal-lg">
                                    <i class="fe fe-eye mr-2"></i>Show
                                </a>

                                <a href="{{url('admin/' . $url . '/edit/' . $record->id)}}"
                                   data-toggle="tooltip"
                                   title="Edit" class="m-l-10 btn btn-success btn-sm">
                                    <i class="fe fe-edit mr-2"></i>Edit
                                </a>

                                <a href="#" class="btn btn-sm btn-danger delete" data-toggle="tooltip"
                                   title data-placement="top" data-value="{{$record->id}}" data-original-title="Delete">
                                    <i class="fe fe-trash mr-2"></i>Delete
                                </a>
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
