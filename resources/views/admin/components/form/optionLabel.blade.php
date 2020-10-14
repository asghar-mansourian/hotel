
<div class="form-group row">
    <label for="example-text-input" class="col-md-3 form-label">{{$label}}</label>
    <div class="col-md-9">

        <select name="{{$name ?? ''}}" id="{{$name ?? ''}}" class="form-control col-12 ">
            {{$items}}
        </select>

    </div>
</div>
