
<div class="form-group row">
    <label for="example-text-input" class="col-4 col-sm-3 col-md-2 col-form-label">{{$label}}</label>
    <div class="col-8 col-sm-9 col-md-10">

        <select name="{{$name ?? ''}}" id="{{$name ?? ''}}" class="custom-select col-12">
            {{$items}}
        </select>

    </div>
</div>
