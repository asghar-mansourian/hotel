<div class="panel  panel-default {{$class ?? ''}}" style=" {{$style ?? ''}}">
    <div class="panel-heading ">

        {{$header}}
        <div class="panel-action">
            <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
        </div>
    </div>
    <div class="panel-body  {{$classBody ?? ''}}">
        {{$items}}

    </div>
</div>



