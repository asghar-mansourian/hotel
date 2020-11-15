<input type="hidden" id="parent_id" value="{{$id}}">

<script>

    $(document).ready(function () {
        counter = 0;
        // var element='<div class="form-group row"> <label for="example-text-input" class="col-md-3 form-label my-auto">key</label> <div class="col-md-9"> <input class="form-control " name="names[]" type="text" placeholder="enter the keyword name" value="" id="[]" ></div> <label for="example-text-input" class="col-md-3 form-label my-auto">value</label> <div class="col-md-9"> <input class="form-control " name="values[]" type="text" placeholder="enter the value name" value="" id="values[]" ></div><div class="col-12 col-lg-12"><div class="input-group"><button type="button" class="btn btn-danger btn-number remove" data-type="minus" id="minus"> <span class="glyphicon glyphicon-minus"></span> </button></div></div></div>';

        var parent_id = $('#parent_id').val();
        var parent = $('#fields .card-body');

        jQuery('#plus').on('click', function () {
            parent.append('<div class="form-group row"> <label for="example-text-input" class="col-md-3 form-label my-auto">key</label> <div class="col-md-9"> <input class="form-control " name="names[]" type="text" placeholder="enter the keyword name" value="" id=' + 'names' + counter + '></div> <label for="example-text-input" class="col-md-3 form-label my-auto">value</label> <div class="col-md-9"> <input class="form-control " name="values[]" type="text" placeholder="enter the value name" value="" id=' + 'values' + counter + '></div><div class="col-12 col-lg-12"><div class="input-group"><button type="button" class="btn btn-danger btn-number remove" data-type="minus" id="minus"> <span class="glyphicon glyphicon-minus"></span> </button></div></div></div>');
            counter += 1;
        });

        $(document).on("click", "button.remove", function () {
            $(this).parent().parent().parent().remove();
        });

    });

</script>
