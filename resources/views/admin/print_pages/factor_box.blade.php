<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
    body {
        font-family: monospace;
    }

    .list {
        width: 378px;
        /*height: 378px;*/
        border: 1pt solid #9c9c9c;
    }

    .border {
        border: 2pt solid #9c9c9c;
    }

    .images {
        height: 91px
    }

    .left_img {
        width: 60%;
        float: left;
        height: 70px
    }

    .right_img {
        width: 40%;
        float: right;
        height: 70px
    }

    .left_img img {
        width: 75%;
        padding: 15px;
        height: 60px
    }

    .right_img img {
        padding: 15px;
        float: right;
        width: 55%;
        height: 60px
    }

    .box {
        text-align: center;
        /*font-weight: 800;*/
        font-size: 40px;
        padding: 10px 0
    }

    .font_14 {
        text-align: center;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        border: 1pt solid #ddd;
        border-top: unset;
    }

    .font_13 {
        text-align: center;
        font-size: 11px;
        font-weight: bold;
        padding: 9px 0;
    }

    .padding_13 {
        padding: 13px 0
    }

</style>
<body>
<div class="list">
    <div class="images">
        <div class="left_img">
            <img src="{{url('front/image/logo-express.svg')}}">
        </div>
        <div class="right_img">
            <img src="{{url('/barcode/example/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=8&text='.$box->barcode.'&thickness=30&code=BCGean13')}}">
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="box border">
        {{__('admin.box_f')}} {{$box->id}}
    </div>
    <div class="font_14">
        {{__('admin.number_of_packages_f')}} {{$box->boxItems->count()}}
    </div>
    <div class="font_14">
        {{__('admin.weight_of_box_f')}} {{$boxWeight}} kg
    </div>
    <div class="font_13">
        {{__('admin.sender_address_f')}} {{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_FACTOR_ADDRESS)}}
    </div>
{{--    <div class="font_13 border padding_13">--}}
{{--        {{__('admin.reciever_address_f')}} {{isset($user->region) ? $user->region->country->name: ''}}/{{isset($user->region) ? $user->region->name: ''}} , {{$user->name . ' ' . $user->family}}--}}
{{--    </div>--}}
</div>
<script>
    window.print()
</script>
</body>
</html>
