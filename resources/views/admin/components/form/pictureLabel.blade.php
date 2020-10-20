<div class="form-group row">
    <label for="example-text-input" class="col-md-3 form-label my-auto">
        {{$label ?? ''}}
    </label>
    <div class="col-md-9">

        <input type="file" name="{{$name ?? ""}}" id="{{$name ?? ""}}" class="dropify" data-max-file-size="500K"
               data-allowed-file-extensions="jpg png"  data-default-file="{{url($value ?? '')}}">
    </div>
</div>


