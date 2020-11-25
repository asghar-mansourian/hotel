<div class="form-group row">
    <label for="example-text-input" class="col-md-3 form-label my-auto">
        {{$label ?? ''}}
    </label>
    <div class="col-md-9">

        <input type="file" class="form-control col-12 " id="{{$name ?? ''}}" name="{{$name ?? ""}}">
        <input type="hidden" name="hidden_file" value="{{$uploaded ?? ''}}" />
    </div>
</div>

