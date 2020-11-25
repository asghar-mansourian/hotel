<div class="form-group row">
    <label for="example-text-input" class="col-md-3 form-label my-auto">key</label>
    <div class="col-md-9">
        <input class="form-control " name="names[0]" type="text" placeholder="enter the keyword name"
               value="{{ $name ?? '' }}" id='names0'>
    </div>
    <label for="example-text-input" class="col-md-3 form-label my-auto">value</label>
    <div class="col-md-9">
        <input class="form-control " name="values[0]" type="text" placeholder="enter the value name"
               value="{{ $value ?? '' }}" id='values0'>
    </div>
    <label for="example-text-input" class="col-md-3 form-label my-auto">can be copy</label>
    <div class="col-md-9">
        <select name="copy[0]" class="form-control browser-default custom-select">
            <option id='' {{$copy == '0' ? 'selected' : ''}} value="0">no</option>
            <option id='' {{$copy == '1' ? 'selected' : ''}} value="1">yes</option>
        </select>

    </div>
</div>

