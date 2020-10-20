<div class="form-group row">
    <label for="example-text-input" class="col-md-3 form-label my-auto">
        {{$label ?? ''}}
        </label>
    <div class="col-md-9">
        <input {{$disabled ?? ''}}   class="form-control {{$class ?? ''}}" name="{{$name ?? ''}}" type="{{$type ?? ''}}"
               placeholder="{{$placeholder ?? ''}}" value="{{$value ?? ''}}"
               id="{{$name ?? ''}}" {{$attr ?? ""}}>
    </div>
</div>
