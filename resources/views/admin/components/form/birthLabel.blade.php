<div class="form-group row">
    <label for="example-text-input" class="col-md-3 form-label my-auto">
        {{$label ?? ''}}
        </label>
    <div class="col-md-9">
        <input class="form-control" type="date" value="{{$value ?? ''}}" name="{{$name}}" placeholder="{{$placeholder}}">
    </div>
</div>
