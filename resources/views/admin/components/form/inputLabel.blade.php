<div class="form-group row">
    <label for="example-text-input" class="col-4 col-sm-3 col-md-2 col-form-label">
        {{$label ?? ''}}
        </label>
    <div class="col-8 col-sm-9 col-md-10">
        <input {{$disabled ?? ''}}   class="form-control {{$class ?? ''}}" name="{{$name ?? ''}}" type="{{$type ?? ''}}"
               placeholder="{{$placeholder ?? ''}}" value="{{$value ?? ''}}"
               id="{{$name ?? ''}}">
    </div>
</div>
