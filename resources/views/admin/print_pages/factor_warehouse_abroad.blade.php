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
        height: 500px;
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
        width: 75%;
    }

    #rotate {
        -webkit-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        transform: rotate(270deg);
    }

    .adres table {
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1pt solid #262626;
        text-align: left;
        padding: 4.5px;
    }

    .adres p {
        margin: 4.1px;
        font-size: 13px;
    }

    .adres_list {
        text-align: center;
    }

    .adres_left {
        width: 237px;
        background: rebeccapurple;
        float: left;
        position: absolute;
        height: 36px;
    }

    .eee {
        vertical-align: bottom;
        text-align: center;
        border-bottom: unset;
        border: 2pt solid #217346
    }

    .eee span {
        -ms-writing-mode: tb-rl;
        -webkit-writing-mode: vertical-rl;
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        white-space: nowrap;
        overflow: hidden;
        height: 267px;
        padding: 0 10px
    }

    .adres_th {
        text-align: center;
    }

    .adres_th span {
        -ms-writing-mode: tb-rl;
        -webkit-writing-mode: vertical-rl;
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        white-space: nowrap;
        overflow: hidden;
        padding: 0 5px
    }

    strong {
        font-size: 12px
    }

    .adres {
        padding: 0.4px 0px
    }
</style>
<body>
<div class="list">
    <div class="images">
        <div class="left_img">
            <img src="{{url('front/image/logo-express.svg')}}">
        </div>
        <div class="right_img">
            <img src="{{url('/barcode/example/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=8&text='.$barcode->barcode.'&thickness=30&code=BCGean13')}}">
        </div>
    </div>
    <div style="clear: both;"></div>
    <table class="" border="1">
        <tr>

            <th class="eee">
                <span>{{__('admin.customer_id_w')}} {{$user->id}}, {{__('admin.Pack_N_w')}} #{{$barcode->orderable->id}}</span>
            </th>
            <td style="padding: 0; border: 1px solid transparent;">
                <div class="adres">
                    <table>
                        <tr>
                            <th class="adres_th"><span>{{__('admin.sender_w')}}</span></th>
                            <td class="b_r">
                                <p>
                                    {{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_FACTOR_ADDRESS)}}
                                </p>
{{--                                <br>--}}
{{--                                <br>--}}
                                <p>{{__('admin.tel_w')}} {{\App\Setting::getValue(\App\Setting::FIELD_COMPANY_FACTOR_PHONE)}}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class="adres_th"><span>{{__('admin.reciever_w')}}</span></th>
                            <td class="b_r">
                                <p>{{$user->name . ' ' . $user->family . '  '}}</p>
                                <p>{{isset($user->region) ? $user->region->country->name: ''}}/{{isset($user->region) ? $user->region->name: ''}} - {{$user->address}}</p>
                                <p>{{__('admin.tel_w')}} {{$user->phone}}</p>
                                <p>{{__('admin.postal_code_w')}} {{$user->fin}}</p>
                                <p>{{__('admin.overseas_rack_number_w')}} {{$barcode->orderable->overseas_warehouse_number}}</p>
                                <p>{{__('admin.domestic_rack_number_w')}} {{$barcode->orderable->domestic_warehouse_number}}</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="adres_list">
                    <table>
                        <tr>
                            <th><strong>{{__('admin.count_of_packages_w')}}</strong></th>
                            <th><strong>{{__('admin.total_gross_weight_w')}}</strong></th>
                            <th><strong>{{__('admin.delivery_price_w')}}</strong></th>
                            <th><strong>{{__('admin.invoice_price_w')}}</strong></th>
                        </tr>
                        <tr>
                            <td>{{$barcode->orderable->quantity}}</td>
                            <td>{{$barcode->orderable->weight}}</td>
                            <td>{{$barcode->orderable->weight_price}} $</td>
                            <td>{{\App\lib\Helpers::formatPrice($priceDollar)}} $</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>
<script>
    window.print()
</script>
</body>
</html>
