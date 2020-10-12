<div class="form-group">
        <select {{$disabled ?? ''}}  name="{{$name ?? ''}}" id="{{$name ?? ''}}" class="form-control custom-select col-12">
            {{$items}}
        </select>
</div>


