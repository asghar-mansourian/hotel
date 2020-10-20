<div class="form-group row">
    <label for="example-text-input" class="col-md-3 form-label my-auto">
        {{$label ?? ''}}
    </label>
    <div class="col-md-9">

        <textarea {{$attr ?? ""}} {{$disabled ?? ''}}   class="form-control {{$class ?? ''}}" name="{{$name ?? ''}}"
                  id="{{$id ?? ''}}" placeholder="{{$placeholder ?? ''}}" cols="30" rows="10">
                        {{$value ?? ''}}
        </textarea>
    </div>
</div>

