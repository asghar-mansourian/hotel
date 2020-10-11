<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
        <div class="card-options">
            <a href="index-2.html#" class="option-dots" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i
                    class="fe fe-more-horizontal fs-20"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                    {{$options ?? ""}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {{$body}}
        </div>
    </div>
</div>
